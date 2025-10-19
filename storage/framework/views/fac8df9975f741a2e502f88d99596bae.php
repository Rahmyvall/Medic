

<?php $__env->startSection('title', 'Detail Dokter'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Profil Dokter: <?php echo e($dokter->nama); ?></h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-bordered table-hover align-middle">
                    <tbody>
                        
                        <tr>
                            <th class="bg-light" style="width: 250px; font-size: 1.1rem;">Foto Dokter</th>
                            <td style="font-size: 1.1rem;">
                                <?php if($dokter->photo_dokter): ?>
                                    <img src="<?php echo e(asset('storage/' . $dokter->photo_dokter)); ?>" alt="<?php echo e($dokter->nama); ?>"
                                        class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <tr>
                            <th class="bg-light" style="width: 250px; font-size: 1.1rem;">Dokter ID</th>
                            <td style="font-size: 1.1rem;"><?php echo e($dokter->dokter_id); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Nama</th>
                            <td style="font-size: 1.1rem;"><?php echo e($dokter->nama); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Spesialisasi</th>
                            <td style="font-size: 1.1rem;"><?php echo e($dokter->spesialisasi ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Jadwal Praktek</th>
                            <td style="font-size: 1.1rem;"><?php echo e($dokter->jadwal_praktek ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">No STR</th>
                            <td style="font-size: 1.1rem;"><?php echo e($dokter->no_str); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Dibuat Pada</th>
                            <td style="font-size: 1.1rem;"><?php echo e($dokter->created_at->format('d M Y H:i')); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Terakhir Diperbarui</th>
                            <td style="font-size: 1.1rem;"><?php echo e($dokter->updated_at->format('d M Y H:i')); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                <a href="<?php echo e(route('dokter.index')); ?>" class="btn btn-secondary me-2">Kembali</a>
                <a href="<?php echo e(route('dokter.edit', $dokter->id)); ?>" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/dokter/show.blade.php ENDPATH**/ ?>