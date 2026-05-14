<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm mb-4">

    <div class="card-header bg-dark text-white">
        <h3 class="card-title">
            <i class="fas fa-terminal"></i>
            SQL Query Runner
        </h3>
    </div>

    <div class="card-body">

       <form method="post" action="<?= base_url('schema') ?>">

            <div class="form-group">

                <textarea
                    name="query"
                    class="form-control"
                    rows="5"
                    placeholder="Contoh:
SELECT * FROM mahasiswa;
SHOW TABLES;"
                ><?= $query ?? '' ?></textarea>

            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-play"></i>
                Jalankan Query
            </button>

        </form>

        <?php if(!empty($message)): ?>

            <div class="alert alert-info mt-3">
                <?= $message ?>
            </div>

        <?php endif; ?>

        <?php if(isset($result) && is_array($result)): ?>

    <?php if(count($result) > 0): ?>

        <div class="table-responsive mt-4">

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>

                        <?php foreach(array_keys($result[0]) as $field): ?>

                            <th><?= $field ?></th>

                        <?php endforeach; ?>

                    </tr>
                </thead>

                <tbody>

                    <?php foreach($result as $row): ?>

                        <tr>

                            <?php foreach($row as $value): ?>

                                <td><?= $value ?></td>

                            <?php endforeach; ?>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    <?php else: ?>

        <div class="alert alert-warning mt-4">
            
        </div>

    <?php endif; ?>

<?php endif; ?>

<div class="card shadow-sm">

    <div class="card-header bg-success text-white">
        <h3 class="card-title">
            <i class="fas fa-database"></i>
            Schema Database
        </h3>
    </div>

    <div class="card-body">

        <?php foreach($schema as $table => $fields): ?>

            <div class="card mb-4 border-success">

                <div class="card-header bg-light">
                    <h4 class="mb-0 text-success">
                        <?= $table ?>
                    </h4>
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Field</th>
                                <th>Tipe Data</th>
                                <th>Panjang</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach($fields as $field): ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= $field->name ?></td>

                                <td><?= $field->type ?></td>

                                <td><?= $field->max_length ?></td>

                            </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>

<?= $this->endSection() ?>