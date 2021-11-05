<?php
class Alert{

private $type;
private $message;

public function _construct($type,$message)
{
    $this->type=$type;
    $this->message=$message;
}


public function setMessage($message): self
{
$this->message = $message;

return $this;
}

public function getMessage()
{
return $this->message;
}

public function getType()
{
return $this->type;
}

public function setType($type): self
{
$this->type = $type;

return $this;
}
}








?>