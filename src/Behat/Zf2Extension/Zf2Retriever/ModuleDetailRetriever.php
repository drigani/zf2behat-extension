<?php
namespace Behat\Zf2Extension\Zf2Retriever;

use Zend\Mvc\Application;
/**
 * Description of ModuleRetriever
 *
 * @author David Contavalli <mauipipe@gmail.com>
 * @copyright M.V. Associate  - All Rights Reserved -
 *  You may execute and modify the contents of this file, but only within the scope of this project.
 *  Any other use shall be considered forbidden, unless otherwise specified.
 * @link http://www.mvassociates.it
 */
class ModuleDetailRetriever {
    
    private $zf2MvcApplication;
    private $loadedModules;
    
    public function __construct(Application $zf2MvcApplication) {
        
        $this->zf2MvcApplication = $zf2MvcApplication;
        $this->loadedModules = $this->zf2MvcApplication->getServiceManager()->get('ModuleManager')->getLoadedModules();
    }   
    
    /**
     * get all loaded module name
     * @return array
     */
    public function getLoadedModules(){
        
        return array_keys($this->loadedModules);
        
    }
       
    /**
     * Retrieve the module path
     * @param string $moduleName
     */
    public function getModulePath($moduleName) {
                       
        if(!array_key_exists($moduleName, $this->loadedModules)){
            
            throw new \OutOfRangeException("Invalid module: ".$moduleName);
            
        }
        
        $module = $this->loadedModules[$moduleName];
        $moduleConfig = $module->getAutoloaderConfig();
       
        return $moduleConfig['Zend\Loader\StandardAutoloader']['namespaces'][$moduleName];
        
    }   
   
    
}

?>
