<?php
namespace Poli\XML\Controller\Category;
use Magento\TestFramework\Inspection\Exception;

/**
 * Index Controller
 * @package Poli\XML\Controller\Category
 * @autor Diego Andre Poli <diegoandrepoli@gmail.com>
 */
class Index extends \Magento\Framework\App\Action\Action {

    /**
     * @throws Exception
     */
    public function execute() {
        //parâmetro de url - id
        $id = $this->getRequest()->getParam('id');

        if(empty($id)){
            throw new Exception('Categoria não informada');
        }

        //intância do objeto
        $object = \Magento\Framework\App\ObjectManager::getInstance();
        //instância da categoria
        $categories = $object->get('Magento\Catalog\Model\Category');
        //busca categoria
        $category = $categories->load($id);
        //busca produtos da categoria informada
        $products = $categories->getProductCollection()->addCategoryFilter($category)
            ->addAttributeToFilter('type_id', 'simple')
            ->addAttributeToSelect('*');

        //elemento XML
        $xml = new \SimpleXMLElement('<xml/>');
        //adiciona produtos ao elemento XML
        foreach($products as $product){
            $track = $xml->addChild('product');
            $track->addChild('id', htmlspecialchars($product->getId()));
            $track->addChild('name', htmlspecialchars($product->getName()));
        }

        //escreve XML
        Header('Content-type: text/xml');
        print $xml->asXML();
    }
}