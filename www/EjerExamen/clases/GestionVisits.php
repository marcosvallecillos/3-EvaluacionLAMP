<?php
class GestionVisits {
    public $visit= [];
  
    public function getVisit()
    {
        return $this->visit;
    }
    function isVIP($amount)
    {
        return $amount > 250;
    }
    function drawList()
    {
        $conn = mysqli_connect('db', 'root', 'test', "Hospital");
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
        $query = 'SELECT * From Visits';
        $result = mysqli_query($conn, $query);

        echo '<table class="table table-striped">';
        echo '<thead><tr><th>id</th><th>amount</th><th>date</th><th>paid</th></tr></thead>';
        while($value = $result->fetch_array(MYSQLI_ASSOC)){
            echo '<tr>';
            foreach($value as $element){
                echo '<td>' . $element . '</td>';
            }

            echo '</tr>';
        }
        echo '</table>';

        $result->close();
        mysqli_close($conn);

        $html = "";
    
        $html .= '<tr>';
        $html .= '<td colspan="7" style="text-align: center;"><a href="add.php"><img src="img/add.JPG" width="35"></a></td>';
        $html .= '</tr>';
    
        foreach ($this->visit as $visit) {
            
            if($visit->getPaid()=="True" && $visit->getAmount()>250){
                $styleClass = '';
            if ($this->isVIP($visit->getAmount())) {
                $styleClass = 'vip';
            }
            $html .= '<tr class="' . $styleClass . '">';
            $html .= '<td>' . $visit->getPatient() . '</td>';
            $html .= '<td>' . $visit->getAmount() . '</td>';
            $html .= '<td class="' . $styleClass . '">' . $visit->getDate() . '</td>';
            if ($visit->getPaid() == 'True') {
                $html .= '<td><img src="img/img05.gif"></td>';
            } else {
                $html .= '<td><img src="img/img06.gif"></td>';
            }
            $html .= "<td><a href='delete.php?id=" . $visit->getPatient() . "'><img src='img/delete.gif' width='25'></a></td>";
            $html .= "<td><a href='edit.php?id=" . $visit->getPatient() . "'><img class='activo' src='img/edit.gif' width='25'></a></td>";
            $html .= "<td><a href='index.search.php?id=" . $visit->getPatient() . "'><img class='activo' src='img/add.gif' width='25'></a></td>";
            $html .= '</tr>';
        }
        }
        
        return $html;

}

    
    public function loadData($fichero)
    {
 
    }
    public function delete($id)
    {

    }

    function persist()
    {

    }
    function getClient($patient){
        foreach ($this->visit as $visit){
            if($visit->getPatient() == $patient){
            return $visit;
            }
        }
    }
    public function update($datos)
    {
       
    }
    public function insert($data) {

    }       
    public function drawListPatient($patientId) {
       
    }
}    

