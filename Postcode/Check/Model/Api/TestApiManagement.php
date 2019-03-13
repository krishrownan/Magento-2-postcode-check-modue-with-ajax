<?php
 
namespace Postcode\Check\Model\Api;
 
class TestApiManagement implements \Postcode\Check\Api\TestApiManagementInterface
{
    const SEVERE_ERROR = 0;
    const SUCCESS = 1;
    const LOCAL_ERROR = 2;
 
    protected $_postapiFactory;
 
    public function __construct(
        \Postcode\Check\Model\TestApiFactory $postApiFactory
 
    ) {
        $this->_postapiFactory = $postApiFactory;
    }
 
    /**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Webkul\TestApi\Api\Data\TestApiInterface
     */
    public function getApiData($id)
    {
        try {
            $model = $this->_postapiFactory
                ->create();
 
            if (!$model->getId()) {
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('no data found')
                );
            }
 
            return $model;
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $returnArray['error'] = $e->getMessage();
            $returnArray['status'] = 0;
            $this->getJsonResponse(
                $returnArray
            );
        } catch (\Exception $e) {
            $this->createLog($e);
            $returnArray['error'] = __('unable to process request');
            $returnArray['status'] = 2;
            $this->getJsonResponse(
                $returnArray
            );
        }
    }
}