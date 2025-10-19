

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Tentang Rumah Sakit</h1>

                <?php if(Auth::user()->role === 'admin'): ?>
                    <?php if($about): ?>
                        <a href="<?php echo e(route('about_us.edit', $about->id)); ?>" class="btn btn-success">
                            <i class="fas fa-edit"></i> Edit Data
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <?php if($about): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <tbody>
                                        <tr>
                                            <th style="width: 20%">Judul</th>
                                            <td><?php echo e($about->title); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td><?php echo e($about->description); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Visi</th>
                                            <td><?php echo e($about->vision); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Misi</th>
                                            <td><?php echo nl2br(e($about->mission)); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sejarah</th>
                                            <td><?php echo e($about->history); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td><?php echo e($about->address); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Telepon</th>
                                            <td><?php echo e($about->phone); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo e($about->email); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gambar</th>
                                            <td>
                                                <?php if($about->image): ?>
                                                    <?php
                                                        // Pastikan image selalu array
                                                        $images = is_array($about->image)
                                                            ? $about->image
                                                            : json_decode($about->image, true);
                                                    ?>

                                                    <?php if($images && count($images) > 0): ?>
                                                        <div class="d-flex flex-wrap gap-2">
                                                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <img src="<?php echo e(asset('storage/' . $img)); ?>" alt="Gambar About"
                                                                    class="img-thumbnail"
                                                                    style="width: 200px; height: 150px; object-fit: cover;">
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php else: ?>
                                                        <span class="text-muted">Belum ada gambar</span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <span class="text-muted">Belum ada gambar</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="text-center text-muted py-5">
                                <p>Belum ada data tentang rumah sakit.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/about_us/index.blade.php ENDPATH**/ ?>