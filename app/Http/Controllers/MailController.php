<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
 
class MailController extends Controller 
{
  	public function sendEmail(
  		$eMail,
  		$messageSubject, 
  		$textLetter
  	){   	
  		// Для примера	
 		mail($eMail, $messageSubject, $textLetter);
  	}
 
  	public function prepareSendingEmails($order_id)
  	{
 		$order = Order::find($order_id);
 		// Формируем текст письма
 		$textLetter = '';
 		foreach ($order->orderProducts as $product){			
			$textLetter .= $product->product->name.' \n ';
		}
		$textLetter .= 'Стоимость заказа : '.$order->getPriceOrder();
 		// Отправка партнеру
 		$this->sendEmail(
 			$order->partner->email, 
 			'заказ №'.$order->id.' завершен',
 			$textLetter
 		);
 		// Отправка поставщикам
 		foreach ($order->orderProducts as $product){			
			$this->sendEmail(
 				$product->product->vendor->email, 
 				'заказ №'.$order->id.' завершен',
 				$textLetter
 			);
		}
  	}
}