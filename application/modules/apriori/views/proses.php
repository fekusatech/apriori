<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $title ?></h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            Apriori Proses
                        </h3>
                        <br>
                        <hr>
                        <!-- <button type="button" class="btn btn-success btn-sm" id="tambah"><i class="fas fa-plus"></i> Tambah</button> -->
                        <div class="form-group row">
                            <div class="form-group col-6">
                                <label>Tanggal Mulai:</label>
                                <div class="input-group input-group-sm date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="date" class="form-control" id="start_datenya" value="<?= date('Y-m-d') ?>">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Tanggal Selesai:</label>
                                <div class="input-group input-group-sm date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="date" class="form-control" id="end_datenya" value="<?= date('Y-m-d') ?>">
                                </div>
                            </div>
                            <button class="m-2 btn btn-sm btn-primary" onclick="applysearch()">Search</button>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-6">
                                <label>Min Support:</label>
                                <div class="input-group input-group-sm date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="text" class="form-control" id="min_support" value="">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Min Confidence:</label>
                                <div class="input-group input-group-sm date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="text" class="form-control" id="min_confidence" value="">
                                </div>
                            </div>
                            <button class="m-2 btn btn-sm btn-success">Proses</button>
                        </div>
                    </div>
                    <div class="card-body pad table-responsive">
                        <table class="table table-bordered table-sm" id="myData" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>