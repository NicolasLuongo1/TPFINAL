<?php 

namespace Models;

class JobPositions {
private $jobPositionId;
private $description;
private $careerId;
function __construct()
{


}

public function getJobPositionId()
{
return $this->jobPositionId;
}


public function setJobPositionId($jobPositionId): self
{
$this->jobPositionId = $jobPositionId;

return $this;
}


public function getDescriptionJ()
{
return $this->description;
}


public function setDescriptionj($description): self
{
$this->description = $description;

return $this;
}


public function getCareerId()
{
return $this->careerId;
}


public function setCareerId($careerId): self
{
$this->careerId = $careerId;

return $this;
}
}
?>