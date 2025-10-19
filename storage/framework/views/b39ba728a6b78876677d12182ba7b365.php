

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Rekap Pembayaran</h1>

                <div class="d-flex">
                    
                    <form action="<?php echo e(route('pembayaran.index')); ?>" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama Dokter"
                            value="<?php echo e(request('search')); ?>">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    
                    <?php if(Auth::user()->role === 'admin'): ?>
                        <a href="<?php echo e(route('pembayaran.create')); ?>" class="btn btn-success">Tambah Pembayaran</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pasien</th>
                                    <th>Dokter</th>
                                    <th>Total Tagihan</th>
                                    <th>Metode Bayar</th>
                                    <th>Status</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pembayarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($p->pembayaran_id); ?></td>
                                        <td><?php echo e($p->pasien->nama_pasien ?? '-'); ?></td>
                                        <td><?php echo e($p->dokter->nama ?? '-'); ?></td>
                                        <td>Rp <?php echo e(number_format($p->total_tagihan, 2, ',', '.')); ?></td>
                                        <td><?php echo e(ucfirst($p->metode_bayar)); ?></td>
                                        <td>
                                            <?php if($p->status == 'lunas'): ?>
                                                <span class="badge bg-success text-white"><?php echo e(ucfirst($p->status)); ?></span>
                                            <?php elseif($p->status == 'pending'): ?>
                                                <span class="badge bg-warning text-white"><?php echo e(ucfirst($p->status)); ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-danger text-white"><?php echo e(ucfirst($p->status)); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td><?php echo e($p->tanggal_bayar ? \Carbon\Carbon::parse($p->tanggal_bayar)->format('d-m-Y H:i') : '-'); ?>

                                        </td>
                                        <td><?php echo e($p->keterangan ?? '-'); ?></td>
                                        <td>
                                            
                                            <a href="<?php echo e(route('pembayaran.show', $p->pembayaran_id)); ?>"
                                                class="btn btn-info btn-sm">Detail</a>

                                            
                                            <?php if(Auth::user()->role === 'admin'): ?>
                                                <a href="<?php echo e(route('pembayaran.edit', $p->pembayaran_id)); ?>"
                                                    class="btn btn-warning btn-sm">Edit</a>

                                                
                                                <form action="<?php echo e(route('pembayaran.destroy', $p->pembayaran_id)); ?>"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        
                        <div class="mt-4 text-end">
                            <?php echo e($pembayarans->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/pembayaran/index.blade.php ENDPATH**/ ?>