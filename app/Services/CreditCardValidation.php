<?php
namespace App\Services;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\Exceptions\CreditCardChecksumException;
use LVR\CreditCard\Exceptions\CreditCardException;
use LVR\CreditCard\Exceptions\CreditCardLengthException;
use LVR\CreditCard\Factory;

class CreditCardValidation extends CardNumber{
    public function passes($attribute, $value)
    {
        try {
            return Factory::makeFromNumber($value)->isValidCardNumber();
        } catch (CreditCardLengthException $ex) {
            $this->message = 'Указан неверный номер карты';

            return false;
        } catch (CreditCardChecksumException $ex) {
            $this->message = 'Указан неверный номер карты';

            return false;
        } catch (CreditCardException $ex) {
            $this->message = 'Указан неверный номер карты';

            return false;
        }
    }
}
