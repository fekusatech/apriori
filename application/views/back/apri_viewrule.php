<?php $data_confidence = array(); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header  card-header-primary">
                        <h3 class="card-title">
                            Hasil View Rule
                        </h3>
                    </div>
                    <div class="card-body">
                        <h3>Confidence dari itemset 3</h3>
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>X => Y</th>
                                    <th>Support X U Y</th>
                                    <th>Support X </th>
                                    <th>Confidence</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if ($getdataconfidence3) {
                                    foreach ($getdataconfidence3 as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . $row['kombinasi1'] . " => " . $row['kombinasi2'] . "</td>";
                                        echo "<td>" . price_format($row['support_xUy']) . "</td>";
                                        echo "<td>" . price_format($row['support_x']) . "</td>";
                                        echo "<td>" . price_format($row['confidence']) . "</td>";
                                        $keterangan = ($row['confidence'] <= $row['min_confidence']) ? "Tidak Lolos" : "Lolos";
                                        echo "<td>" . $keterangan . "</td>";
                                        echo "</tr>";
                                        $no++;
                                        //if($row['confidence']>=$row['min_cofidence']){
                                        if ($row['lolos'] == 1) {
                                            $data_confidence[] = $row;
                                        }
                                    }
                                } else {
                                    echo "<tr>";
                                    echo "<td colspan='6' align='center'>Data tidak ada</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <h3>Confidence dari itemset 2</h3>
                        <table class='table table-bordered table-striped  table-hover'>
                            <tr>
                                <th>No</th>
                                <th>X => Y</th>
                                <th>Support X U Y</th>
                                <th>Support X </th>
                                <th>Confidence</th>
                                <th>Keterangan</th>
                            </tr>
                            <?php
                            $no = 1;
                            if ($getdataconfidence2) {
                                foreach ($getdataconfidence2 as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $no . "</td>";
                                    echo "<td>" . $row['kombinasi1'] . " => " . $row['kombinasi2'] . "</td>";
                                    echo "<td>" . price_format($row['support_xUy']) . "</td>";
                                    echo "<td>" . price_format($row['support_x']) . "</td>";
                                    echo "<td>" . price_format($row['confidence']) . "</td>";
                                    $keterangan = ($row['confidence'] <= $row['min_confidence']) ? "Tidak Lolos" : "Lolos";
                                    echo "<td>" . $keterangan . "</td>";
                                    echo "</tr>";
                                    $no++;
                                    //if($row['confidence']>=$row['min_cofidence']){
                                    if ($row['lolos'] == 1) {
                                        $data_confidence[] = $row;
                                    }
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='6' align='center'>Data tidak ada</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                        <h3>Rule Asosiasi:</h3>
                        <table class='table table-bordered table-striped  table-hover'>
                            <tr>
                                <th>No</th>
                                <th>X => Y</th>
                                <th>Confidence</th>
                                <th>Korelasi rule</th>
                            </tr>
                            <?php
                            $no = 1;
                            //while($row=$db_object->db_fetch_array($query)){
                            foreach ($data_confidence as $key => $val) {
                                if ($no == 1) {
                                    echo "<br>";
                                    echo "Min support: " . $val['min_support'];
                                    echo "<br>";
                                    echo "Min confidence: " . $val['min_confidence'];
                                    echo "<br>";
                                    echo "Start Date: " . format_date_db($val['start_date']);
                                    echo "<br>";
                                    echo "End Date: " . format_date_db($val['end_date']) . "<br>";
                                }
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $val['kombinasi1'] . " => " . $val['kombinasi2'] . "</td>";
                                echo "<td>" . price_format($val['confidence']) . "</td>";

                                echo "<td>" . ($val['korelasi_rule']) . "</td>";
                                //echo "<td>" . ($val['lolos'] == 1 ? "Lolos" : "Tidak Lolos") . "</td>";
                                echo "</tr>";
                                $no++;
                            }
                            ?>
                        </table>
                        <h2>Hasil Analisa</h2>
                        <!-- <a href="export/CLP.php?id_process=<?php echo $id_process; ?>" class="btn btn-app btn-light btn-xs" target="blank">
                            <i class="ace-icon fa fa-print bigger-160"></i>
                            Print
                        </a> -->
                        <br>
                        <table class='table table-bordered table-striped  table-hover'>
                            <?php
                            $no = 1;
                            //while($row=$db_object->db_fetch_array($query)){
                            foreach ($data_confidence as $key => $val) {
                                if ($val['lolos'] == 1) {
                                    echo "<tr>";
                                    echo "<td>" . $no . ". Jika konsumen membeli " . $val['kombinasi1']
                                        . ", maka konsumen juga akan membeli " . $val['kombinasi2'] . "</td>";
                                    echo "</tr>";
                                }
                                $no++;
                            }
                            ?>
                        </table>
                        <?php
                        //query itemset 1
                        $sql1 = "SELECT * FROM itemset1  WHERE id_process = '$id_process' ORDER BY lolos DESC";
                        $query1 = $this->db->query($sql1);
                        $itemset1 = $jumlahItemset1 = $supportItemset1 = array();
                        ?>
                        <hr>
                        <h3>Perhitungan</h3>
                        <strong>Itemset 1:</strong></br>
                        <table class='table table-bordered table-striped  table-hover'>
                            <tr>
                                <th>No</th>
                                <th>Item 1</th>
                                <th>Jumlah</th>
                                <th>Support</th>
                                <th>Keterangan</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($query1->result_array() as $row1) {
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $row1['atribut'] . "</td>";
                                echo "<td>" . $row1['jumlah'] . "</td>";
                                echo "<td>" . price_format($row1['support']) . "</td>";
                                echo "<td>" . ($row1['lolos'] == 1 ? "Lolos" : "Tidak Lolos") . "</td>";
                                echo "</tr>";
                                $no++;
                                if ($row1['lolos'] == 1) {
                                    $itemset1[] = $row1['atribut']; //item yg lolos itemset1
                                    $jumlahItemset1[] = $row1['jumlah'];
                                    $supportItemset1[] = price_format($row1['support']);
                                }
                            }
                            ?>
                        </table>
                        <?php
                        //display itemset yg lolos
                        echo "<br><strong>Itemset 1 yang lolos:</strong><br>";
                        echo "<table class='table table-bordered table-striped  table-hover'>
                    <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Jumlah</th>
                        <th>Suppport</th>
                    </tr>";
                        $no = 1;
                        foreach ($itemset1 as $key => $value) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $value . "</td>";
                            echo "<td>" . $jumlahItemset1[$key] . "</td>";
                            echo "<td>" . $supportItemset1[$key] . "</td>";
                            echo "</tr>";
                            $no++;
                        }
                        echo "</table>";
                        ?>
                        <?php
                        //query itemset 2
                        $sql2 = "SELECT * FROM itemset2 WHERE id_process = '$id_process' ORDER BY lolos DESC";
                        $query2 = $this->db->query($sql2);
                        $itemset2_var1 = $itemset2_var2 = $jumlahItemset2 = $supportItemset2 = array();
                        ?>
                        <hr>
                        <strong>Itemset 2:</strong></br>
                        <table class='table table-bordered table-striped  table-hover'>
                            <tr>
                                <th>No</th>
                                <th>Item 1</th>
                                <th>Item 2</th>
                                <th>Jumlah</th>
                                <th>Support</th>
                                <th>Keterangan</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($query2->result_array() as $row2) {
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $row2['atribut1'] . "</td>";
                                echo "<td>" . $row2['atribut2'] . "</td>";
                                echo "<td>" . $row2['jumlah'] . "</td>";
                                echo "<td>" . price_format($row2['support']) . "</td>";
                                echo "<td>" . ($row2['lolos'] == 1 ? "Lolos" : "Tidak Lolos") . "</td>";
                                echo "</tr>";
                                $no++;
                                if ($row2['lolos'] == 1) {
                                    $itemset2_var1[] = $row2['atribut1'];
                                    $itemset2_var2[] = $row2['atribut2'];
                                    $jumlahItemset2[] = $row2['jumlah'];
                                    $supportItemset2[] = price_format($row2['support']);
                                }
                            }
                            ?>
                        </table>
                        <?php
                        //display itemset yg lolos
                        echo "<br><strong>Itemset 2 yang lolos:</strong><br>";
                        echo "<table class='table table-bordered table-striped  table-hover'>
                    <tr>
                        <th>No</th>
                        <th>Item 1</th>
                        <th>Item 2</th>
                        <th>Jumlah</th>
                        <th>Suppport</th>
                    </tr>";
                        $no = 1;
                        foreach ($itemset2_var1 as $key => $value) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $value . "</td>";
                            echo "<td>" . $itemset2_var2[$key] . "</td>";
                            echo "<td>" . $jumlahItemset2[$key] . "</td>";
                            echo "<td>" . $supportItemset2[$key] . "</td>";
                            echo "</tr>";
                            $no++;
                        }
                        echo "</table>";
                        ?>

                        <?php
                        //query itemset 3
                        $sql3 = "SELECT * FROM itemset3  WHERE id_process = '$id_process' ORDER BY lolos DESC";
                        $query3 = $this->db->query($sql3);
                        $itemset3_var1 = $itemset3_var2 = $itemset3_var3 = $jumlahItemset3 = $supportItemset3 = array();
                        ?>
                        <hr>
                        <strong>Itemset 3:</strong></br>
                        <table class='table table-bordered table-striped  table-hover'>
                            <tr>
                                <th>No</th>
                                <th>Item 1</th>
                                <th>Item 2</th>
                                <th>Item 3</th>
                                <th>Jumlah</th>
                                <th>Support</th>
                                <th>Keterangan</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($query3->result_array() as $row3) {
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $row3['atribut1'] . "</td>";
                                echo "<td>" . $row3['atribut2'] . "</td>";
                                echo "<td>" . $row3['atribut3'] . "</td>";
                                echo "<td>" . $row3['jumlah'] . "</td>";
                                echo "<td>" . price_format($row3['support']) . "</td>";
                                echo "<td>" . ($row3['lolos'] == 1 ? "Lolos" : "Tidak Lolos") . "</td>";
                                echo "</tr>";
                                $no++;
                                if ($row3['lolos'] == 1) {
                                    $itemset3_var1[] = $row3['atribut1'];
                                    $itemset3_var2[] = $row3['atribut2'];
                                    $itemset3_var3[] = $row3['atribut3'];
                                    $jumlahItemset3[] = $row3['jumlah'];
                                    $supportItemset3[] = $row3['support'];
                                }
                            }
                            ?>
                        </table>

                        <?php
                        //display itemset yg lolos
                        echo "<br><strong>Itemset 3 yang lolos:</strong><br>";
                        echo "<table class='table table-bordered table-striped  table-hover'>
                    <tr>
                        <th>No</th>
                        <th>Item 1</th>
                        <th>Item 2</th>
                        <th>Item 3</th>
                        <th>Jumlah</th>
                        <th>Suppport</th>
                    </tr>";
                        $no = 1;
                        foreach ($itemset3_var1 as $key => $value) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $value . "</td>";
                            echo "<td>" . $itemset3_var2[$key] . "</td>";
                            echo "<td>" . $itemset3_var3[$key] . "</td>";
                            echo "<td>" . $jumlahItemset3[$key] . "</td>";
                            echo "<td>" . $supportItemset3[$key] . "</td>";
                            echo "</tr>";
                            $no++;
                        }
                        echo "</table>";
                        ?>

                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<?php
function format_date2($date)
{
    $date_ex = explode("-", $date);
    return $date_ex[2] . "/" . $date_ex[1] . "/" . $date_ex[0];
}
function price_format($value)
{
    return number_format($value, 2, ',', '.');
}
function format_date_db($date)
{
    $date_ex = explode("-", $date);
    return $date_ex[2] . "-" . $date_ex[1] . "-" . $date_ex[0];
}
?>