<!-- Sidebar -->
<div class="adminx-sidebar expand-hover push">
    <ul class="sidebar-nav">

        @php
            $user = App\Models\User::where('id', Auth::id())->first();
        @endphp

        @if ($user->role !== 'Asisten')
            @if ($user->role !== 'PJ')
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#example" aria-expanded="false"
                        aria-controls="example">
                        <span class="sidebar-nav-icon">
                            <i data-feather="pie-chart"></i>
                        </span>
                        <span class="sidebar-nav-name">
                            Data
                        </span>
                        <span class="sidebar-nav-end">
                            <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                        </span>
                    </a>

                    <ul class="sidebar-sub-nav collapse" id="example">
                        <li class="sidebar-nav-item">
                            <a href="{{ route('indexDataAss') }}" class="sidebar-nav-link">
                                <span class="sidebar-nav-abbr">
                                    Da
                                </span>
                                <span class="sidebar-nav-name">
                                    Data Asisten
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-nav-item">
                            <a href="{{ route('indexDataKel') }}" class="sidebar-nav-link">
                                <span class="sidebar-nav-abbr">
                                    Dk
                                </span>
                                <span class="sidebar-nav-name">
                                    Data Kelas
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-nav-item">
                            <a href="{{ route('indexDataMat') }}" class="sidebar-nav-link">
                                <span class="sidebar-nav-abbr">
                                    Dm
                                </span>
                                <span class="sidebar-nav-name">
                                    Data Materi
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="sidebar-nav-item">
                <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navTables" aria-expanded="false"
                    aria-controls="navTables">
                    <span class="sidebar-nav-icon">
                        <i data-feather="align-justify"></i>
                    </span>
                    <span class="sidebar-nav-name">
                        Generator
                    </span>
                    <span class="sidebar-nav-end">
                        <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                    </span>
                </a>

                <ul class="sidebar-sub-nav collapse" id="navTables">
                    <li class="sidebar-nav-item">
                        <a href="{{ route('indexKode') }}" class="sidebar-nav-link">
                            <span class="sidebar-nav-abbr">
                                Cg
                            </span>
                            <span class="sidebar-nav-name">
                                Code Generator
                            </span>
                        </a>
                    </li>

                    {{-- <li class="sidebar-nav-item">
                        <a href="./layouts/tables_data.html" class="sidebar-nav-link">
                            <span class="sidebar-nav-abbr">
                                Da
                            </span>
                            <span class="sidebar-nav-name">
                                Data Tables
                            </span>
                        </a>
                    </li> --}}
                </ul>
            </li>
        @endif

        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navForms" aria-expanded="false"
                aria-controls="navForms">
                <span class="sidebar-nav-icon">
                    <i data-feather="edit"></i>
                </span>
                <span class="sidebar-nav-name">
                    Report
                </span>
                <span class="sidebar-nav-end">
                    <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                </span>
            </a>

            <ul class="sidebar-sub-nav collapse" id="navForms">
                <li class="sidebar-nav-item">
                    <a href="./layouts/form_elements.html" class="sidebar-nav-link">
                        <span class="sidebar-nav-abbr">
                            Re
                        </span>
                        <span class="sidebar-nav-name">
                            Report
                        </span>
                    </a>
                </li>

                <li class="sidebar-nav-item">
                    <a href="./layouts/form_advanced.html" class="sidebar-nav-link">
                        <span class="sidebar-nav-abbr">
                            Ra
                        </span>
                        <span class="sidebar-nav-name">
                            Riwayat Absen
                        </span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div><!-- Sidebar End -->
