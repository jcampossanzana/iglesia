<?php 
/**
 * LoremPixel - Placeholder Images for every case.
 * http://lorempixel.com/
 * 
 */
/**
 * Copyright (c) 2012 David Soyez
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *  
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *  
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * 
 *
 * @author David Soyez <david.soyez@yiiframework.fr>
 * @link http://www.yiiframework.com/extension
 * @copyright Copyright &copy; 2012 yiiframework.fr
 * @license http://www.opensource.org/licenses/mit-license.php
 * @version 0.1
 * @package LoremPixel
 * @since 0.1
 */
class LoremPixel extends CWidget
{

	/**
	 * Width of the image to generate
	 * Default to 640
	 * @var int
	 */
	public $width = 640;

	/**
	 * Height of the image to generate
	 * Default to 480
	 * @var int
	 */	
	public $height = 480;

	/**
	 * Category of the image to generate.
	 * Random if null.
	 * Default to NULL
	 * @var string|NULL
	 */	
	public $category;

	/**
	 * Generate only gray images
	 * Default to FALSE
	 * @var int
	 */
	public $gray = FALSE;

	/**
	 * Must be used with a category
	 * Text to display on the image.
	 * Default to NULL
	 * @var string
	 */
	public $text;		

	/**
	 * Must be used with a category
	 * id of the image to show (1/10)
	 * of the given category name.
	 * Default to NULL
	 * @var int
	 */
	public $number;	

	/**
	 * The alt text of the image
	 * Default to demo image
	 * @var string
	 */
	public $alt='demo image';		
	
	/**
	 * Html options of the image
	 * @var int
	 */
	public $htmlOptions = array();			

	/**
	 * Class name of the CHTML to use to
	 * generate the image.
	 */
	 public $className = 'CHtml';

	/**
	 * Available image categories
	 * @var array
	 */
	 protected $_categories = array(
	 	'abstract',
	 	'animal',
	 	'city',
	 	'food',
	 	'nightlife',
	 	'fashion',
	 	'people',
	 	'nature',
	 	'sports',
	 	'technics',
	 	'transport'
	);

	/**
	 * Url of the lorempixel website
	 * @var string
	 */
	 protected $_url = 'http://lorempixel.com';

	/**
	 * Run the widget
	 */
	public function run() 
	{
		$url = $this->_url . '/';

		// is gray image?
		if($this->gray == TRUE)
			$url .= 'g/';		

		$url .= (int)$this->width . '/' . (int)$this->height ;

		// add the category
		if($this->category != NULL)
		{
			$category = strtolower($this->category);
			if(in_array($category, $this->_categories))
			{
				$url .=  '/' . $category;	
				
				// if a number is given			
				if($this->number != NULL AND $this->number <= 10)
					$url .=  '/' . $this->number;	

				// if has text to display
				if($this->text != NULL)
					$url .=  '/' . urlencode($this->text);					
			}
		}

		// output the rendered image
		echo call_user_func(array($this->className, 'image'), $url, $this->alt, $this->htmlOptions);
	}

}