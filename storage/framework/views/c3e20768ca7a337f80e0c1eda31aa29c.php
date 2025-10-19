

<?php $__env->startSection('tambah', 'Detail Pembayaran'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-money-check-alt me-2"></i>
                        <h5 class="mb-0">Detail Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID Pembayaran</th>
                                <td>
                                    <?php echo e($pembayaran->pembayaran_id); ?><br>

                                </td>
                            </tr>
                            <tr>
                                <th>Pasien</th>
                                <td><?php echo e($pembayaran->kunjungan->pasien->nama_pasien ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Dokter</th>
                                <td><?php echo e($pembayaran->kunjungan->dokter->nama ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Total Tagihan</th>
                                <td>Rp <?php echo e(number_format($pembayaran->total_tagihan, 2, ',', '.')); ?></td>
                            </tr>
                            <tr>
                                <th>Metode Bayar</th>
                                <td><?php echo e(ucfirst($pembayaran->metode_bayar)); ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php if($pembayaran->status == 'lunas'): ?>
                                        <span class="badge bg-success text-white"><?php echo e(ucfirst($pembayaran->status)); ?></span>
                                    <?php elseif($pembayaran->status == 'pending'): ?>
                                        <span class="badge bg-warning text-dark"><?php echo e(ucfirst($pembayaran->status)); ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-danger text-white"><?php echo e(ucfirst($pembayaran->status)); ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Bayar</th>
                                <td><?php echo e($pembayaran->tanggal_bayar ? \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d-m-Y H:i') : '-'); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td><?php echo e($pembayaran->keterangan ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>QR Code</th>
                                <td>
                                    <?php echo DNS2D::getBarcodeHTML(
                                        "ID: {$pembayaran->pembayaran_id}\nPasien: {$pembayaran->kunjungan->pasien->nama_pasien}\nDokter: {$pembayaran->kunjungan->dokter->nama}\nTotal: Rp " .
                                            number_format($pembayaran->total_tagihan, 2, ',', '.') .
                                            "\nMetode Bayar: " .
                                            ucfirst($pembayaran->metode_bayar) .
                                            "\nStatus: " .
                                            ucfirst($pembayaran->status),
                                        'QRCODE',
                                    ); ?>

                                </td>
                            </tr>
                        </table>


                        <a href="<?php echo e(route('pembayaran.index')); ?>" class="btn btn-secondary mt-3">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/pembayaran/show.blade.php ENDPATH**/ ?>