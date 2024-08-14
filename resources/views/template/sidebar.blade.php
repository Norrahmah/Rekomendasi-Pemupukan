<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <strong>Rekomendasi Pemupukan</strong>
        </div>
        <div>
            <h4 class="logo-text"></h4>
        </div>
        <div class="toggle-icon ms-auto"><i class="lni lni-menu"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        @if (auth()->user()->level == 'admin')
        <li>
            <a href="{{ url('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-detail"></i>
                </div>
                <div class="menu-title">Data Master</div>
            </a>
            <ul>
                <li> <a href="{{ route('user.index') }}"><i class="bx bx-right-arrow-alt"></i>User</a>
                </li>
                <li> <a href="{{ route('petani.index') }}"><i class="bx bx-right-arrow-alt"></i>Petani</a>
                </li>
                <li> <a href="{{ route('usia-cabai-tumbuh.index') }}"><i class="bx bx-right-arrow-alt"></i>Usia Cabai
                        Tumbuh</a>
                </li>
                <li> <a href="{{ route('ph-tanah-tumbuh.index') }}"><i class="bx bx-right-arrow-alt"></i>pH Tanah
                        Tumbuh</a>
                </li>
                <li> <a href="{{ route('kondisi-iklim-tumbuh.index') }}"><i class="bx bx-right-arrow-alt"></i>Kondisi
                        Iklim Tumbuh</a>
                </li>
                <li> <a href="{{ route('karakteristik-tanaman-tumbuh.index') }}"><i
                            class="bx bx-right-arrow-alt"></i>Karakteristik Tanaman Tumbuh</a>
                </li>
                <li> <a href="{{ route('jenis-pupuk-tumbuh.index') }}"><i class="bx bx-right-arrow-alt"></i>Jenis Pupuk
                        Tumbuh</a>
                </li>
                <li> <a href="{{ route('dosis-pupuk-tumbuh.index') }}"><i class="bx bx-right-arrow-alt"></i>Dosis Pupuk
                        Tumbuh</a>
                </li>
                <li> <a href="{{ route('usia-cabai-panen.index') }}"><i class="bx bx-right-arrow-alt"></i>Usia Cabai
                        Panen</a>
                </li>
                <li> <a href="{{ route('ph-tanah-panen.index') }}"><i class="bx bx-right-arrow-alt"></i>pH Tanah
                        Panen</a>
                </li>
                <li> <a href="{{ route('kondisi-iklim-panen.index') }}"><i class="bx bx-right-arrow-alt"></i>Kondisi
                        Iklim Panen</a>
                </li>
                <li> <a href="{{ route('karakteristik-tanaman-panen.index') }}"><i
                            class="bx bx-right-arrow-alt"></i>Karakteristik Tanaman Panen</a>
                </li>
                <li> <a href="{{ route('jenis-pupuk-panen.index') }}"><i class="bx bx-right-arrow-alt"></i>Jenis Pupuk
                        Panen</a>
                </li>
                <li> <a href="{{ route('dosis-pupuk-panen.index') }}"><i class="bx bx-right-arrow-alt"></i>Dosis Pupuk
                        Panen</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-detail"></i>
                </div>
                <div class="menu-title">Rules</div>
            </a>
            <ul>
                <li> <a href="{{ route('rules-tumbuh.index') }}"><i class="bx bx-right-arrow-alt"></i>Rules Pertumbuhan</a>
                </li>
                <li> <a href="{{ route('rules-panen.index') }}"><i class="bx bx-right-arrow-alt"></i>Rules Panen</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-detail"></i>
                </div>
                <div class="menu-title">Riwayat</div>
            </a>
            <ul>
                <li> <a href="{{ route('rekomendasi-tumbuh-admin') }}"><i class="bx bx-right-arrow-alt"></i>Pertumbuhan</a>
                </li>
                <li> <a href="{{ route('rekomendasi-panen-admin') }}"><i class="bx bx-right-arrow-alt"></i>Panen</a>
                </li>
            </ul>
        </li>

      <li class="">
            <a href="{{ url('/') }}">
                <div class="parent-icon"><i class='bx bx-detail'></i>
                </div>
                <div class="menu-title" style="font-size: 12px;font-weight:bold;">Rekomendasi Pemupukan</div>
            </a>
        </li>
      

 


        <!--------------------------------------------------------------------------------->

        @endif
    </ul>
</div>
