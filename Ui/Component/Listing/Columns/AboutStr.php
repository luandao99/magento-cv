<?php
namespace Project\Cv\Ui\Component\Listing\Columns;

class AboutStr extends \Magento\Ui\Component\Listing\Columns\Column
{
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = 'about';
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$fieldName] = substr($item[$fieldName], 0, 20) . '...';
            }
        }
        return $dataSource;
    }
}