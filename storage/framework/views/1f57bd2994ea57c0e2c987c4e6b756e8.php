

<?php $__env->startSection('title', 'Detail Detail Resep'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-notes-medical me-2"></i>
                        <h5 class="mb-0">Detail Resep</h5>
                    </div>
                    <div class="card-body">
                        
                        <table class="table table-bordered mb-4">
                            <tr>
                                <th>Nama Resep</th>
                                <td><?php echo e($detailresep->resep->resep_id ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Nama Obat</th>
                                <td><?php echo e($detailresep->obat->nama_obat ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Dosis</th>
                                <td><?php echo e($detailresep->dosis); ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td><?php echo e($detailresep->jumlah); ?></td>
                            </tr>
                        </table>

                        <a href="<?php echo e(route('detailreseps.index')); ?>" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/detailreseps/show.blade.php ENDPATH**/ ?>