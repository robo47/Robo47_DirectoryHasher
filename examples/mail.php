<?php

/**
 * This script is meant as for example a cronjob, which checks a directory on
 * each run, compares it to an old result and if there are differences, it send
 * a mail with swiftmailer, which is assumend to be located in a subdirectory 
 * named swiftmailer.
 * 
 * Old xml-files are renamed to old-<?php date(
 * 
 * Don't forget to change include-path to DirectoryHasher (line 38)
 *
 * Example uses an output directory where it saves a new.xml and old.xml, 
 * directory has to 
 */

## normal configuration ##

$directory = dirname(__FILE__) . '/../src/'; // the directory which should be checked
$outputdirectory = dirname(__FILE__) . '/data-mail/'; // directory where the xml-files are saved

## end normal configuration ##

## Configuration swiftmailer ##

$swiftdata = array();
$swiftdata['smtp'] = array();
$swiftdata['smtp']['host'] = 'mail.example.com';
$swiftdata['smtp']['port'] = '25';
$swiftdata['smtp']['username'] = 'username';
$swiftdata['smtp']['password'] = 'password';

$swiftdata['from'] = array('name' => 'Absender', 'email' => 'absender@example.com');
$swiftdata['to'] = array('name' => 'Empfänger', 'email' => 'empfaenger@example.com');

## end Configuration swiftmailer ##

require_once dirname(__FILE__) . '/../src/Robo47/DirectoryHasher/Autoloader.php';
Robo47_DirectoryHasher_Autoloader::register();
require_once dirname(__FILE__) . '/swiftmailer/lib/swift_required.php';

if (!file_exists($outputdirectory)) {
    mkdir ($outputdirectory);
}

create_new_resultfile($directory, $outputdirectory);

$differences = check_differences($outputdirectory . '/old.xml', $outputdirectory . '/new.xml');

if (count($differences) > 0) {
    dh_send_info_mail($swiftdata, $differences);
}
/**
 * @param string $directory
 * @param string $outputfile
 */
function create_new_resultfile($directory, $outputdirectory)
{
    $writer = new Robo47_DirectoryHasher_Writer_File_Xml();
    if (file_exists($outputdirectory . '/new.xml')) {
        if (file_exists($outputdirectory . '/old.xml')) {
            rename($outputdirectory . '/old.xml', $outputdirectory . '/old-' . date('m.d.Y-h-i') .'.xml');
        }
        rename($outputdirectory . '/new.xml', $outputdirectory . '/old.xml');
    }

    // For first run
    if (!file_exists($outputdirectory . '/old.xml')) {
        $writer->write(new Robo47_DirectoryHasher_Result(), $outputdirectory . '/old.xml');
    }


    $source = new Robo47_DirectoryHasher_Source_Directory($directory);
    $multihasher = new Robo47_DirectoryHasher_Hasher_Multi(
                    array(
                        new Robo47_DirectoryHasher_Hasher_MD5(),
                        new Robo47_DirectoryHasher_Hasher_SHA1(),
                        new Robo47_DirectoryHasher_Hasher_FileData()
                    )
    );

    $hasher = new Robo47_DirectoryHasher($source, $multihasher);
    $hasher->run();

    $writer->write($hasher->getResult(), $outputdirectory . '/new.xml');
}

/**
 * Checks for differences between two xml files and returns array with differences
 *
 * @param string $old Path to old xml-file
 * @param string $new Path to new xml-file
 * @return array
 */
function check_differences($old, $new) {
    $factory = new Robo47_DirectoryHasher_Result_Factory_Xml();

    $comparator = new Robo47_DirectoryHasher_Comparator();

    return $comparator->compare(
            $factory->buildResultFromFile($old)
            ,
            $factory->buildResultFromFile($new)
            )->getDifferences();
}

/**
 * Takes care of building the mail body and sending the mail with swiftmailer
 *
 * @param array $data
 * @param array $differences
 */
function dh_send_info_mail(array $data, array $differences) {

    $data['charset'] = 'utf-8';
    $data['text'] = 'Found ' . count($differences) . ' differences' . PHP_EOL . PHP_EOL;

    $data['subject'] = 'Found ' . count($differences) . 'differences';

    $i = 0;
    foreach ($differences as $difference) {
        /* @var $difference Robo47_DirectoryHasher_Comparator_Difference_Interface */
        $data['text'] .= $i . ')' . PHP_EOL;
        $data['text'] .= $difference->toString() . PHP_EOL . PHP_EOL;
        $i++;
    }

    $smtp = new Swift_SmtpTransport($data['smtp']['host'], $data['smtp']['port']);
    $smtp->setUsername($data['smtp']['username']);
    $smtp->setPassword($data['smtp']['password']);


    $mail = new Swift_Message($data['subject']);
    $mail->setBody($data['text'])
            ->setCharset($data['charset'])
            ->setFrom($data['from']['email'], $data['from']['name'])
            ->setTo($data['to']['email'], $data['to']['name']);


    $swift = new Swift_Mailer($smtp);
    $swift->send($mail);
}