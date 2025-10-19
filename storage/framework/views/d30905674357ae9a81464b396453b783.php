

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Laboratorium</h1>

                <div class="d-flex">
                    
                    <form action="<?php echo e(route('laboratorium.index')); ?>" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control me-2"
                            placeholder="Cari Nama Pasien/Jenis Pemeriksaan/Hasil" value="<?php echo e(request('search')); ?>">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    
                    <?php if(Auth::user()->role === 'admin'): ?>
                        <a href="<?php echo e(route('laboratorium.create')); ?>" class="btn btn-success">Tambah Laboratorium</a>
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
                                    <th>Nama Pasien</th>
                                    <th>Jenis Pemeriksaan</th>
                                    <th>Hasil</th>
                                    <th>File Hasil</th>
                                    <th>Tanggal Dibuat</th>
                                    <th class="text-center" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $laboratoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($lab->rekamMedis->nama_pasien ?? '-'); ?></td>
                                        <td><?php echo e($lab->jenis_pemeriksaan); ?></td>
                                        <td><?php echo e($lab->hasil); ?></td>
                                        <td>
                                            <?php if($lab->file_hasil): ?>
                                                <a href="<?php echo e(asset('storage/' . $lab->file_hasil)); ?>" target="_blank">
                                                    Lihat File
                                                </a>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($lab->created_at ? $lab->created_at->format('d/m/Y H:i') : '-'); ?></td>
                                        <td class="text-center">
                                            <?php if(Auth::user()->role === 'admin'): ?>
                                                <a href="<?php echo e(route('laboratorium.edit', $lab)); ?>"
                                                    class="btn btn-success btn-sm me-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <form action="<?php echo e(route('laboratorium.destroy', $lab)); ?>" method="POST"
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
                                        <td colspan="7" class="text-center text-muted">
                                            Tidak ada data laboratorium.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        
                        <div class="mt-4 text-end">
                            <?php echo e($laboratoria->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/laboratorium/index.blade.php ENDPATH**/ ?>