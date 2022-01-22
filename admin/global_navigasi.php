<!-- Sidebar Menu -->
<div class="collapse navbar-collapse" id="navbar-menu">
    <ul class="navbar-nav pt-lg-3">
        <li class="nav-item <?php if ($halaman == 'dashboard') echo "active" ?>">
            <a class="nav-link" href="index">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="5 12 3 12 12 3 21 12 19 12" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                    </svg>
                </span>
                <span class="nav-link-title">
                    Beranda
                </span>
            </a>
        </li>



        <li class="nav-item <?php if ($halaman == 'Visi Misi' or $halaman == 'Struktur Organisasi' or $halaman == 'Badan Pengurus') echo "active" ?> dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                        <line x1="12" y1="12" x2="20" y2="7.5" />
                        <line x1="12" y1="12" x2="12" y2="21" />
                        <line x1="12" y1="12" x2="4" y2="7.5" />
                        <line x1="16" y1="5.25" x2="8" y2="9.75" />
                    </svg>
                </span>
                <span class="nav-link-title">
                    Profil
                </span>
            </a>
            <div class="dropdown-menu <?php if ($halaman == 'Profil - Visi Misi' or $halaman == 'Profil - Struktur Organisasi' or $halaman == 'Profil - Badan Pengurus' or $halaman == 'Profil - Anggota Unit Usaha Lainnya' or $halaman == 'Profil - Anggota Kuliner' or $halaman == 'Profil - Anggota Pertamini' or $halaman == 'Profil - Anggota KSP') echo "show" ?>">
                <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                        <a class="dropdown-item <?php if ($halaman == 'Profil - Visi Misi') echo "active" ?>" href="./visi-misi">
                            Visi Misi
                        </a>
                        <a class="dropdown-item <?php if ($halaman == 'Profil - Struktur Organisasi') echo "active" ?>" href="./struktur-organisasi">
                            Struktur Organisasi
                        </a>
                        <a class="dropdown-item <?php if ($halaman == 'Profil - Badan Pengurus') echo "active" ?>" href="./badan-pengurus">
                            Badan Pengurus
                        </a>
                    </div>
                </div>
                <div class="dropdown-menu-column">
                    <div class="dropend">
                        <?php $retVal = ($halaman == 'Profil - Anggota Unit Usaha Lainnya' or $halaman == 'Profil - Anggota Kuliner' or $halaman == 'Profil - Anggota Pertamini' or $halaman == 'Profil - Anggota KSP') ? 'show' : ''; ?>
                        <a class="dropdown-item dropdown-toggle  <?= $retVal; ?>" href="#" data-bs-toggle="dropdown" role="button">
                            Anggota
                        </a>
                        <div class="dropdown-menu <?= $retVal; ?>">
                            <a href="./anggotaksp.php" class="dropdown-item <?php if ($halaman == 'Profil - Anggota KSP') echo "active" ?>">KSP</a>
                            <a href="./anggotapertamini" class="dropdown-item <?php if ($halaman == 'Profil - Anggota Pertamini') echo "active" ?>">Pertamini</a>
                            <a href="./anggotakuliner" class="dropdown-item <?php if ($halaman == 'Profil - Anggota Kuliner') echo "active" ?>">Kuliner</a>
                            <a href="./anggotauul" class="dropdown-item <?php if ($halaman == 'Profil - Anggota Unit Usaha Lainnya') echo "active" ?>">Unit Usaha Lainnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>







        <li class="nav-item <?php if ($halaman == 'Laporan - Unit Usaha Lainnya' or $halaman == 'Laporan - Unit Usaha Kuliner' or $halaman == 'Laporan - Unit Usaha Pertamini' or $halaman == 'Laporan - Unit Usaha KSP' or $halaman == 'Laporan - Badan Usaha Sekretaris' or $halaman == 'Laporan - Badan Usaha Bendahara') echo "active" ?> dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                        <line x1="12" y1="12" x2="20" y2="7.5" />
                        <line x1="12" y1="12" x2="12" y2="21" />
                        <line x1="12" y1="12" x2="4" y2="7.5" />
                        <line x1="16" y1="5.25" x2="8" y2="9.75" />
                    </svg>
                </span>
                <span class="nav-link-title">
                    Laporan
                </span>
            </a>        
            <div class="dropdown-menu">
                <div class="dropdown-menu-column">
                    <div class="dropend">
                        <a class="dropdown-item <?php if ($halaman == 'Laporan - Unit Usaha Lainnya' or $halaman == 'Laporan - Unit Usaha Kuliner' or $halaman == 'Laporan - Unit Usaha Pertamini' or $halaman == 'Laporan - Unit Usaha KSP') echo "show" ?> dropdown-toggle" href="#" data-bs-toggle="dropdown" role="button">
                            Unit Usaha
                        </a>
                        <div class="dropdown-menu <?= $retVal; ?>">
                            <a href="./laporanksp.php" class="dropdown-item <?php if ($halaman == 'Laporan - Unit Usaha KSP') echo "active" ?>">KSP</a>
                            <a href="./laporanpertamini" class="dropdown-item <?php if ($halaman == 'Laporan - Unit Usaha Pertamini') echo "active" ?>">Pertamini</a>
                            <a href="./laporankuliner" class="dropdown-item <?php if ($halaman == 'Laporan - Unit Usaha Kuliner') echo "active" ?>">Kuliner</a>
                            <a href="./laporanuul" class="dropdown-item <?php if ($halaman == 'Laporan - Unit Usaha Lainnya') echo "active" ?>">Unit Usaha Lainnya</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown-menu-column">
                    <div class="dropend">
                    <?php $retVal = ($halaman == 'Laporan - Badan Usaha Sekretaris' or $halaman == 'Laporan - Badan Usaha Bendahara') ? 'show' : ''; ?>
                        <a class="dropdown-item dropdown-toggle  <?= $retVal; ?>" href="#" data-bs-toggle="dropdown" role="button">
                            Badan Usaha
                        </a>
                        <div class="dropdown-menu">
                            <a href="./sekretaris.php" class="dropdown-item <?php if ($halaman == 'Laporan - Badan Usaha Sekretaris') echo "active" ?>">Sekretaris</a>
                            <a href="./bendahara.php" class="dropdown-item <?php if ($halaman == 'Laporan - Badan Usaha Bendahara') echo "active" ?>">Bendahara</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>




















        <li class="nav-item <?php if ($halaman == 'Permohonan Pinjaman' or $halaman == 'Pelunasan Pinjaman' or $halaman == 'Kerjasama') echo "active" ?> dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                    </svg>
                </span>
                <span class="nav-link-title">
                    Layanan
                </span>
            </a>
            <div class="dropdown-menu <?php if ($halaman == 'Data Pemohon' or $halaman == 'Permohonan Pinjaman' or $halaman == 'Kerjasama') echo "show" ?>">
                <a class="dropdown-item <?php if ($halaman == 'Data Pemohon') echo "active" ?>" href="./data-pemohon">
                    Pemohon Pinjaman
                </a>
                <a class="dropdown-item <?php if ($halaman == 'Permohonan Pinjaman') echo "active" ?>" href="./permohonan-pinjaman">
                    Pinjaman & Pelunasan
                </a>
                <a class="dropdown-item <?php if ($halaman == 'Kerjasama') echo "active" ?>" href="./kerjasama">
                    Kerjasama
                </a>
            </div>
        </li>
        <li class="nav-item  <?php if ($halaman == 'Kegiatan') echo "active" ?>">
            <a class="nav-link" href="./kegiatan">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                        <line x1="9" y1="9" x2="10" y2="9" />
                        <line x1="9" y1="13" x2="15" y2="13" />
                        <line x1="9" y1="17" x2="15" y2="17" />
                    </svg>
                </span>
                <span class="nav-link-title">
                    Kegiatan
                </span>
            </a>
        </li>
    </ul>
</div>
</div>
</aside>
<header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>


        <?php
        $query = mysqli_query($koneksi, "SELECT pelunasan.id_pelunasan, pelunasan.id_permohonan, pelunasan.bayar_ke, pelunasan.tanggal_jatuh_tempo, pm.nama FROM `pelunasan_pinjaman` AS pelunasan JOIN permohonan_pinjaman AS permohonan ON permohonan.id_permohonan = pelunasan.id_permohonan JOIN peminjam AS pm ON pm.id_peminjam = permohonan.id_peminjam WHERE pelunasan.notif = 'Belum Baca';");
        $i = 1;
        $row = $query->num_rows;
        ?>

        <li class="dropdown mr-5" style="list-style: none;">
            <a href="#" class="nav-link d-flex lh-1 text-reset p-3 m-1" data-toggle="dropdown">
                <span class="label label-pill label-danger count" style="border-radius:50px;"></span>
                <span class="fa fa-bell" style="font-size:18px;"></span>

                <small class="badge bg-red m-2" style="border-radius:10px;"><?= $row; ?></small></a>
            <ul class="dropdown-menu">
                <div class="card" style="width: 300px;">
                    <div class="card-header">
                        Notifikasi
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($query as $data) : ?>
                            <a href="detail-pinjaman-pelunasan?id=<?= $data['id_permohonan'] ?>&read=<?= $data['id_pelunasan'] ?>" style="text-decoration: none;">
                                <strong class="me-auto" style="color: #ff0000"><?= $i; ?> | BELUM BAYAR</strong><br>
                                <span class="message">Pelunasan Ke-<?= $data['bayar_ke']; ?> </span><br>
                                <span class="message"><?= $data['nama']; ?> </span><br>
                                <small class="text-muted">Jatuh Tempo <?= tgl_indo($data['tanggal_jatuh_tempo']); ?></small>
                            </a>
                            <br>
                            <br>
                        <?php $i++;
                        endforeach; ?>
                    </div>
                </div>
            </ul>
        </li>



        <div class="navbar-nav flex-row order-md-last">

            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(./img/user/<?= $gambar ?>)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div><?= $namalengkap; ?></div>
                        <div class="mt-1 small text-muted"><?= $level; ?></div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="./gantipassword" class="dropdown-item">Ganti Password</a>
                    <a href="./uploadfoto" class="dropdown-item">Ganti Foto Profil</a>
                    <a href="./setting" class="dropdown-item">Settings</a>
                    <a href="../logout.php" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div>
                <!-- <form action="." method="get">
                    <div class="input-icon">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="10" cy="10" r="7" />
                                <line x1="21" y1="21" x2="15" y2="15" /></svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Search…" aria-label="Search in website">
                    </div>
                </form> -->
            </div>
        </div>
    </div>
</header>