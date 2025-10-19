

<?php $__env->startSection('judul', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row g-4">
            <!-- Total Dokter -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo e(route('dokter.index')); ?>" class="text-decoration-none">
                    <div class="card shadow-sm h-100 border-0 rounded-3 bg-gradient-primary text-white p-3 hover-scale">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase fw-bold small mb-2">Jumlah Dokter</h6>
                                <h3 class="fw-bold mb-0"><?php echo e($totalDokter); ?></h3>
                            </div>
                            <i class="fas fa-user-md fa-3x opacity-75"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Pasien -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo e(route('pasien.index')); ?>" class="text-decoration-none">
                    <div class="card shadow-sm h-100 border-0 rounded-3 bg-gradient-info text-white p-3 hover-scale">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase fw-bold small mb-2">Jumlah Pasien</h6>
                                <h3 class="fw-bold mb-0"><?php echo e($totalPasien); ?></h3>
                            </div>
                            <i class="fas fa-procedures fa-3x opacity-75"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Kunjungan -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo e(route('kunjungan.index')); ?>" class="text-decoration-none">
                    <div class="card shadow-sm h-100 border-0 rounded-3 bg-gradient-success text-white p-3 hover-scale">
                        <div class="card-body d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="fw-bold small mb-2">Jumlah Kunjungan</h6>
                                <h3 class="fw-bold mb-3"><?php echo e($totalKunjungan); ?></h3>
                                <div class="mt-2 d-flex flex-wrap">
                                    <?php $__currentLoopData = $kunjunganPerJenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kunjungan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $warna = match (strtolower($kunjungan->jenis_kunjungan)) {
                                                'igd' => 'danger',
                                                'rawat jalan' => 'info',
                                                'rawat inap' => 'warning',
                                                default => 'secondary',
                                            };
                                        ?>
                                        <a href="<?php echo e(route('kunjungan.index', ['jenis' => $kunjungan->jenis_kunjungan])); ?>"
                                            class="badge rounded-pill bg-<?php echo e($warna); ?> text-white me-2 mb-2 text-decoration-none">
                                            <?php echo e($kunjungan->jenis_kunjungan); ?>: <?php echo e($kunjungan->total); ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div>
                                <i class="fas fa-notes-medical fa-3x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Rekam Medis -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo e(route('rekam_medis.index')); ?>" class="text-decoration-none">
                    <div class="card shadow-sm h-100 border-0 rounded-3 bg-gradient-warning text-dark p-3 hover-scale">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase fw-bold small mb-2">Jumlah Rekam Medis</h6>
                                <h3 class="fw-bold mb-0"><?php echo e($totalRekamMedis); ?></h3>
                            </div>
                            <i class="fas fa-file-medical fa-3x opacity-50"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <!-- Area Chart: Kunjungan per Dokter -->
            <div class="col-xl-8 col-lg-7 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kunjungan Dokter</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="kunjunganDokterChart" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Pie Chart: Kunjungan Per Jenis -->
            <div class="col-xl-4 col-lg-5 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kunjungan Rawat</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="kunjunganJenisChart" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Area Chart: Kunjungan per Dokter
        const dokterLabels = <?php echo json_encode($dokterLabels, 15, 512) ?>;
        const pasienCounts = <?php echo json_encode($pasienCounts, 15, 512) ?>;
        new Chart(document.getElementById('kunjunganDokterChart'), {
            type: 'line',
            data: {
                labels: dokterLabels,
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: pasienCounts,
                    backgroundColor: 'rgba(78, 115, 223, 0.2)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Dokter'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Kunjungan'
                        }
                    }
                }
            }
        });

        const jenisLabels = <?php echo json_encode($kunjunganPerJenis->pluck('jenis_kunjungan'), 15, 512) ?>;
        const jenisCounts = <?php echo json_encode($kunjunganPerJenis->pluck('total'), 15, 512) ?>;

        const ctx = document.getElementById('kunjunganJenisChart').getContext('2d');

        const kunjunganJenisChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: jenisLabels,
                datasets: [{
                    data: jenisCounts,
                    backgroundColor: [
                        'rgba(78, 115, 223, 0.7)',
                        'rgba(28, 200, 138, 0.7)',
                        'rgba(54, 185, 204, 0.7)',
                        'rgba(246, 194, 62, 0.7)'
                    ],
                    borderColor: '#fff'
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                onClick: function(evt, elements) {
                    if (elements.length > 0) {
                        const index = elements[0].index;
                        const jenis = this.data.labels[index];
                        // Arahkan ke halaman kunjungan sesuai jenis
                        window.location.href = "<?php echo e(route('kunjungan.index')); ?>?jenis=" + encodeURIComponent(
                            jenis);
                    }
                }
            }
        });
    </script>

    <style>
        .hover-scale:hover {
            transform: scale(1.03);
            transition: transform 0.3s ease-in-out;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>