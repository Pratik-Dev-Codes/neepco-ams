<?php

namespace App\Importer;

use App\Models\Accessory;

class AccessoryImporter extends ItemImporter
{
    public function __construct($filename)
    {
        parent::__construct($filename);
    }

    protected function handle($row)
    {
        parent::handle($row); // TODO: Change the autogenerated stub
        $this->createAccessoryIfNotExists($row);
    }

    /**
     * Create an accessory if a duplicate does not exist
     *
     */
    public function createAccessoryIfNotExists($row)
    {
        $accessory = Accessory::where('name', $this->item['name'])->first();
        if ($accessory) {
            if (! $this->updating) {
                $this->log('A matching Accessory '.$this->item['name'].' already exists.  ');

                return;
            }

            $this->log('Updating Accessory');
            $this->item['model_number'] = trim($this->findCsvMatch($row, "model_number"));
            $accessory->update($this->sanitizeItemForUpdating($accessory));
            $accessory->save();

            return;
        }
        $this->log('No Matching Accessory, Creating a new one');
        $accessory = new Accessory();
        $accessory->created_by = auth()->id();
        $this->item['model_number'] = $this->findCsvMatch($row, "model_number");
        $this->item['min_amt'] = $this->findCsvMatch($row, "min_amt");
        $accessory->fill($this->sanitizeItemForStoring($accessory));

        // This sets an attribute on the Loggable trait for the action log
        $accessory->setImported(true);
        if ($accessory->save()) {
            $this->log('Accessory '.$this->item['name'].' was created');

            return;
        }
        $this->logError($accessory, 'Accessory');
    }
}
