<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header bg-primary">
        <h3 class="card-title">Informasi Schema Database</h3>
    </div>

    <div class="card-body">

        <?php foreach ($schema as $namaTabel => $fields): ?>
            <div class="card card-outline card-info mb-4">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        Tabel: <?= ucfirst(str_replace('_', ' ', $namaTabel)) ?>
                    </h4>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Max Length</th>
                                <th>Primary Key</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fields as $field): ?>
                            <tr>
                                <td><?= $field->name ?></td>
                                <td><?= $field->type ?></td>
                                <td><?= $field->max_length ?? '-' ?></td>
                                <td>
                                    <?= $field->primary_key ? '<span class="badge badge-success">YES</span>' : '-' ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</div>

<?= $this->endSection() ?>