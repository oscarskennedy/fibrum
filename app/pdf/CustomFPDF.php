<?php

namespace App\Pdf;

use setasign\Fpdi\Fpdi;

class CustomFPDF extends Fpdi
{
    protected $charSpacing = 0;

    // Ajustar espaciado entre caracteres
    public function SetCharSpacing($size)
    {
        $this->charSpacing = $size;

        if ($this->page > 0) {
            // Tc = Text Character Spacing
            $this->_out(sprintf('BT %.2f Tc ET', $size));
        }
    }

    // Modificación de Cell
    public function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        if ($this->charSpacing != 0) {
            $this->_out(sprintf('BT %.2f Tc ET', $this->charSpacing));
        }

        parent::Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);

        if ($this->charSpacing != 0) {
            $this->_out('BT 0 Tc ET');
        }
    }

    // Modificación de MultiCell
    public function MultiCell($w, $h, $txt='', $border=0, $align='L', $fill=false)
    {
        if ($this->charSpacing != 0) {
            $this->_out(sprintf('BT %.2f Tc ET', $this->charSpacing));
        }

        parent::MultiCell($w, $h, $txt, $border, $align, $fill);

        if ($this->charSpacing != 0) {
            $this->_out('BT 0 Tc ET');
        }
    }
}
