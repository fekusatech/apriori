<section class="content">
    <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header  card-header-primary">
                        <h3 class="card-title">
                          Hasil Log
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Min Support</th>
                                    <th>Min Confidence</th>
                                    <th>View</th>
                                    <!-- <th>Pdf</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($listlog as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $no . "</td>";
                                    echo "<td>" . format_date2($row['start_date']) . "</td>";
                                    echo "<td>" . format_date2($row['end_date']) . "</td>";
                                    echo "<td>" . $row['min_support'] . "</td>";
                                    echo "<td>" . $row['min_confidence'] . "</td>";
                                    $view = "<a href='".base_url("apriori/apri_hasil/view/{$row['id']}")."'>View rule</a>";
                                    echo "<td>" . $view . "</td>";
                                    // echo "<td>";
                                    // echo "<a href='export/CLP.php?id_process=" . $row['id'] . "' " . "class='btn btn-xs btn-outline-success' target='blank'>
                                    //         <i class='fas fa-print'></i>
                                    //         Print
                                    //       </a>";
                                    // echo "</td>";
                                    echo "</tr>";
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
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
?>