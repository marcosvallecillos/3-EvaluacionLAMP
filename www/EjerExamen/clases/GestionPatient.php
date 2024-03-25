<?php
class GestionPatient{
    private $patient= [];
    private $fichero;

    function __construct($fichero)
    {
        $this->fichero = $fichero;
        $this->loadData($fichero);
    }
    public function getPatient()
    {
        return $this->patient;
    }
    function drawList()
    {
        $html = "";
        $html = "";
    
        $html .= '<tr>';
        $html .= '<td colspan="7" style="text-align: center;"><a href="add_patient.php"><img src="img/add.JPG" width="35"></a></td>';
        $html .= '</tr>';
        foreach ($this->patient as $patient) {
            $styleClass = '';
            $html .= '<tr class="' . $styleClass . '">';
            $html .= '<td>' . $patient->getId() . '</td>';
            $html .= '<td>' . $patient->getName() . '</td>';
            $html .= '<td>' . $patient->getTown() . '</td>';
            $html .= '<td>' . $patient->getaddress() . '</td>';
            $html .= "<td><a href='delete_patient.php?id=" . $patient->getId() . "'><img src='img/delete.gif' width='25'></a></td>";
            $html .= "<td><a href='edit_patient.php?id=" . $patient->getId() . "'><img class='activo' src='img/edit.gif' width='25'></a></td>";
          
        }
        return $html;
    }
    public function loadData($fichero)
    {
        $gestor = fopen($fichero, "r");
        while (($element = fgetcsv($gestor)) !== false) {
            array_push(
                $this->patient,
                new Patient(...$element) // Spread Operator
            );
        }
        fclose($gestor);
    }
    public function delete($id)
    {
        for ($i = 0; $i < count($this->patient); $i++) {
            if ($id == $this->patient[$i]->getId()) {
                array_splice($this->patient, $i, 1);
            }
        }
        $this->persist();
    }

    function persist()
    {
        $gest = fopen($this->fichero, "w");
        foreach ($this->patient as $patient) {
            fputcsv($gest, [
                $patient->getId(),
                $patient->getName(),
                $patient->getTown(),
                $patient->getaddress(),
            ]);
        }
        fclose($gest);
    }
    function getClient($patientId){
        foreach ($this->patient as $patient){
            if($patient->getId() == $patientId){
                return $patient;
            }
        }
    }
    
   public function update($datos)
{
    foreach ($this->patient as $patient) {
        if ($patient->getId() == $datos["Id"]) {
            $patient->setName($datos["Name"]);
            $patient->setTown($datos["Town"]);
            $patient->setaddress($datos["address"]);
        }
    }
   return $this->persist();
}

    public function insert($data) {
        $gest = fopen("data_patient.csv", "w");
        foreach ($this->patient as $patient) {
            fputcsv($gest, [
                $patient->getId(),
                $patient->getName(),
                $patient->getTown(),
                $patient->getaddress(),
            ]);
        }
        fputcsv($gest,$data);
        fclose($gest);
    }
 
}
