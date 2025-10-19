

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Rekap Dokter</h1>

                <div class="d-flex">
                    
                    <form action="<?php echo e(route('dokter.index')); ?>" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama Dokter"
                            value="<?php echo e(request('search')); ?>">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    
                    <?php if(Auth::user()->role === 'admin'): ?>
                        <a href="<?php echo e(route('dokter.create')); ?>" class="btn btn-success">
                            Tambah Data Dokter
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center" style="width: 5%">#</th>
                                    <th>Foto</th>
                                    <th>Dokter ID</th>
                                    <th>Nama Dokter</th>
                                    <th>Spesialisasi</th>
                                    <th>Jadwal Praktek</th>
                                    <th>No STR</th>
                                    <th class="text-center" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $dokters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                        <td class="text-center">
                                            <?php if($dokter->photo_dokter): ?>
                                                <img src="<?php echo e(asset('storage/' . $dokter->photo_dokter)); ?>"
                                                    alt="<?php echo e($dokter->nama); ?>" class="img-thumbnail"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($dokter->dokter_id); ?></td>
                                        <td><?php echo e($dokter->nama); ?></td>
                                        <td><?php echo e($dokter->spesialisasi ?? '-'); ?></td>
                                        <td><?php echo e($dokter->jadwal_praktek ?? '-'); ?></td>
                                        <td><?php echo e($dokter->no_str); ?></td>
                                        <td class="text-center">
                                            <?php if(Auth::user()->role === 'admin'): ?>
                                                <a href="<?php echo e(route('dokter.show', $dokter->id)); ?>"
                                                    class="btn btn-info btn-sm">
                                                    Detail
                                                </a>
                                                <a href="<?php echo e(route('dokter.edit', $dokter->id)); ?>"
                                                    class="btn btn-success btn-sm me-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="<?php echo e(route('dokter.destroy', $dokter->id)); ?>" method="POST"
                                                    class="d-inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">
                                            Tidak ada data dokter.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        
                        <div class="mt-4 text-end">
                            <?php echo e($dokters->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/dokter/index.blade.php ENDPATH**/ ?>