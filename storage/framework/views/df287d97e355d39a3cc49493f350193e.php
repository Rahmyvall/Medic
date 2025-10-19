

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Dokter</h1>

                <?php if(Auth::user()->role === 'admin'): ?>
                    <a href="<?php echo e(route('doctors.create')); ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Dokter
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <?php if($doctors->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Spesialisasi</th>
                                            <th>Pengalaman</th>
                                            <th>Email</th>
                                            <th>LinkedIn</th>
                                            <th>Twitter</th>
                                            <th style="width: 15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($index + 1); ?></td>
                                                <td>
                                                    <?php if($doctor->photo): ?>
                                                        <img src="<?php echo e(asset('storage/' . $doctor->photo)); ?>"
                                                            alt="<?php echo e($doctor->name); ?>" class="img-thumbnail"
                                                            style="width: 100px; height: 100px; object-fit: cover;">
                                                    <?php else: ?>
                                                        <span class="text-muted">Tidak ada foto</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($doctor->name); ?></td>
                                                <td><?php echo e($doctor->specialty ?? '-'); ?></td>
                                                <td><?php echo e($doctor->experience_years ? $doctor->experience_years . ' Tahun' : '-'); ?>

                                                </td>
                                                <td><?php echo e($doctor->email ?? '-'); ?></td>
                                                <td>
                                                    <?php if($doctor->linkedin_url): ?>
                                                        <a href="<?php echo e($doctor->linkedin_url); ?>" target="_blank"
                                                            class="text-primary">
                                                            <i class="fab fa-linkedin"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($doctor->twitter_url): ?>
                                                        <a href="<?php echo e($doctor->twitter_url); ?>" target="_blank"
                                                            class="text-info">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="<?php echo e(route('doctors.edit', $doctor->id)); ?>"
                                                            class="btn btn-sm btn-success">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>

                                                        <form action="<?php echo e(route('doctors.destroy', $doctor->id)); ?>"
                                                            method="POST"
                                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="text-center text-muted py-5">
                                <p>Belum ada data dokter.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/doctors/index.blade.php ENDPATH**/ ?>