<?php

namespace Modules\Attachments\Http\Controllers\Actions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Attachments\Entities\Attachmentable;
use Intervention\Image\Facades\Image;

class StoreAttachmentAction
{
	/** 
	 * @param [Request] request
	 * @param [integer] order
	 * @param [string] destination
	 * @param [string] type
	 * @return [Attachmentable] attachment
	 */
	public function execute($request, $file_name, $order, $destination, $type)
	{
		$data = [
			'mime' => $request->getClientOriginalExtension(),
			'path' => $request->storeAs($destination, $file_name, 'public'),
			'size' => $request->getSize(),
			'order' => $order,
			'file_name' => $file_name,
			'alt' => $file_name,
			'type' => $type
		];

		// Create attachmentable record
		$attachment = Attachmentable::create($data);

		// Return the attachment
		return $attachment;
	}
}
