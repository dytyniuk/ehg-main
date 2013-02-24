<?
 
class CacheAPC {
 
    var $iTtl; // Time To Live
    var $bEnabled = false; // APC enabled?
 
    // конструктор
    function __construct($iTtl=600) {
        $this->iTtl = $iTtl;
        $this->bEnabled = extension_loaded('apc');
    }
 
    // получаем данные с памяти
    function getData($sKey) {
        $bRes = false;
        $vData = apc_fetch($sKey, $bRes);
        return ($bRes) ? $vData :null;
    }
 
    // сохраняем данные в память
    function setData($sKey, $vData) {
        return apc_store($sKey, $vData, $this->iTtl);
    }
 
    // удаляем данные с памяти
    function delData($sKey) {
        $bRes = false;
        apc_fetch($sKey, $bRes);
        return ($bRes) ? apc_delete($sKey) : true;
    }
}
 
?>