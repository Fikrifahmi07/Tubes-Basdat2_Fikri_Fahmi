<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

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