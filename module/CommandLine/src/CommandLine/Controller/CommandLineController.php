<?php

namespace CommandLine\Controller;
define('DATE_FORMAT','Y-m-d H:i:s(T)');

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Log\Logger;
use CommandLine\Exception\FileNotFoundException;

class CommandLineController extends AbstractActionController
{
    protected $logger;

    protected function initLogger() {
        if (!$this->logger) {
            $this->logger = $this->getServiceLocator()->get('Zend\Log');
        }
        return $this;
    }

    public function myAction()
    {
        // echo "comm:\n";
        $this->initLogger();
        $this->logger->info('Pradėjau: '.date(DATE_FORMAT));
        $config = $this->getServiceLocator()->get('config')['commandline'];

        $dir = $config['dir_import'];
        $regex = $config['filter_regex'];
        $files = array_filter(scandir($config['dir_import'], 1), function ($fileName) use ($dir, $regex) {
             return (is_file($dir . DIRECTORY_SEPARATOR . $fileName) && preg_match($regex, $fileName));
        });
        try {

            $archivePath = $dir . DIRECTORY_SEPARATOR . reset($files);
            $this->logger->info('Ieškau failų:', [$archivePath]);

            if (empty($files)) {
                throw new FileNotFoundException($dir);
            }
        } catch (FileNotFoundException $e)
        {
            $this->logger->info($e->getMessage());
//            $missedAttributes[] = $e->getMessage();
        } // try
        $this->logger->info('Baigiau: '.date(DATE_FORMAT));

        // $command = sprintf('unzip -o "%s" -d "%s" 2>&1', $archivePath, $config['dir_tmp']);
        // exec($command, $out, $code);
        // if ($code) {
        //     throw new OperationFailedException($command, $out);
        // }

        // $xmlName = pathinfo($archivePath, PATHINFO_FILENAME) . '.xml';
        // $xmlPath = $config['dir_tmp'] . DIRECTORY_SEPARATOR . $xmlName;

        // /** @var $request ConsoleRequest */
        // $request = $this->getRequest();
        // $params = $request->getParams();
        // $params['file'] = $xmlPath;
        // $request->setParams(new Parameters($params->toArray()));
        // $this->executeAction();

        // $this->logger->info('Removing tmp file', [$xmlPath]);
        // unlink($xmlPath);

        // $this->emailImportReport(file_get_contents(sprintf('%s/%s.log', 'data/log/import1c', date('Ymd'))));
    }
}