<?php $__env->startSection('tambah', 'Edit Pembayaran'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-edit me-2"></i>
                        <h5 class="mb-0">Edit Data Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('pembayaran.update', $pembayaran->pembayaran_id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            
                            <div class="mb-3">
                                <label for="kunjungan_id" class="form-label">Kunjungan</label>
                                <select class="form-control <?php $__errorArgs = ['kunjungan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="kunjungan_id"
                                    id="kunjungan_id">
                                    <option value="">-- Pilih Kunjungan --</option>
                                    <?php $__currentLoopData = $kunjungans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k->id); ?>"
                                            <?php echo e($pembayaran->kunjungan_id == $k->id ? 'selected' : ''); ?>>
                                            <?php echo e($k->pasien->nama_pasien ?? '-'); ?> - <?php echo e($k->dokter->nama_dokter ?? '-'); ?>

                                            (<?php echo e(ucfirst($k->jenis_kunjungan)); ?>)
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['kunjungan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="mb-3">
                                <label for="total_tagihan" class="form-label">Total Tagihan</label>
                                <input type="number" step="0.01"
                                    class="form-control <?php $__errorArgs = ['total_tagihan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="total_tagihan"
                                    id="total_tagihan" value="<?php echo e(old('total_tagihan', $pembayaran->total_tagihan)); ?>">
                                <?php $__errorArgs = ['total_tagihan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="mb-3">
                                <label for="metode_bayar" class="form-label">Metode Bayar</label>
                                <select class="form-control <?php $__errorArgs = ['metode_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="metode_bayar"
                                    id="metode_bayar">
                                    <option value="">-- Pilih Metode Bayar --</option>
                                    <option value="cash"
                                        <?php echo e(old('metode_bayar', $pembayaran->metode_bayar) == 'cash' ? 'selected' : ''); ?>>
                                        Cash</option>
                                    <option value="BPJS"
                                        <?php echo e(old('metode_bayar', $pembayaran->metode_bayar) == 'BPJS' ? 'selected' : ''); ?>>
                                        BPJS</option>
                                    <option value="asuransi"
                                        <?php echo e(old('metode_bayar', $pembayaran->metode_bayar) == 'asuransi' ? 'selected' : ''); ?>>
                                        Asuransi</option>
                                </select>
                                <?php $__errorArgs = ['metode_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="status"
                                    id="status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="pending"
                                        <?php echo e(old('status', $pembayaran->status) == 'pending' ? 'selected' : ''); ?>>Pending
                                    </option>
                                    <option value="lunas"
                                        <?php echo e(old('status', $pembayaran->status) == 'lunas' ? 'selected' : ''); ?>>Lunas
                                    </option>
                                    <option value="dibatalkan"
                                        <?php echo e(old('status', $pembayaran->status) == 'dibatalkan' ? 'selected' : ''); ?>>
                                        Dibatalkan</option>
                                </select>
                                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="mb-3">
                                <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                                <input type="datetime-local"
                                    class="form-control <?php $__errorArgs = ['tanggal_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tanggal_bayar"
                                    id="tanggal_bayar"
                                    value="<?php echo e(old('tanggal_bayar', optional($pembayaran->tanggal_bayar)->format('Y-m-d\TH:i'))); ?>">
                                <?php $__errorArgs = ['tanggal_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="keterangan" id="keterangan"
                                    rows="3"><?php echo e(old('keterangan', $pembayaran->keterangan)); ?></textarea>
                                <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                                <i class="fas fa-save me-1"></i> Update Pembayaran
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Data pembayaran dapat diperbarui sesuai kunjungan, total tagihan, metode bayar, status, dan tanggal
                        bayar.
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/pembayaran/edit.blade.php ENDPATH**/ ?>