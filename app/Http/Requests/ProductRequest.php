<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'sltParent'=> 'required',
            'sltBrand'=> 'required',
            'sltMadein'=> 'required',
            'sltColor'=> 'required',
            'sltMaterial'=> 'required',
            'sltSize'=> 'required',
            'sltSale'=> 'required',
            'sltType'=> 'required',
            'txtPrice'=> 'required',
            'txtName' => 'required|unique:products,name',
			'fImages' => 'required|image'
			
		];
	}
	public function messages()
	{
		return [
			'sltParent.required' => 'Please choose category',
            'sltBrand.required' => 'Please choose sltBrand',
            'sltMadein.required' => 'Please choose sltMadein',
            'sltColor.required' => 'Please choose sltColor',
            'sltMaterial.required' => 'Please choose sltMaterial',
            'sltSize.required' => 'Please choose sltSize',
            'sltSale.required' => 'Please choose sltSale',
            'sltType.required' => 'Please choose sltType',
			'txtName.required'  => 'Please enter name product',
			'txtName.unique'    => 'Product name is exitst',
            'txtPrice.required'  => 'Please enter price product',
			'fImages.required'  => 'Please choose image',
			'fImages.image'  => 'This File not image'
			
  		];
	}

}
