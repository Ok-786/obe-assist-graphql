<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- ================= Styles ================= -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('dist/css/style.css') }}">

</head>
<body>
    <!-- ========================NAvigation Bar================= -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <img src=" {{  URL::asset('dist/img/avatar5.png') }} " id="faculty-image" alt="" width="30" height="30">
                        <span class="title">ali.fui@edu.pk</span>
                    </a>
                </li>

                <li>
                    <a href="/">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/programs">
                        <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                        <span class="title">Programs</span>
                    </a>
                </li>

                <li>
                    <a href="/peo">
                        <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                        <span class="title">PEOs</span>
                    </a>
                </li>

                <li>
                    <a href="/courses">
                        <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                        <span class="title">Courses</span>
                    </a>
                </li>

                <li>
                    <a href="/clos">
                        <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                        <span class="title">CLOs</span>
                    </a>
                </li>

                <li>
                    <a href="/mapping">
                        <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                        <span class="title">Mapping</span>
                    </a>
                </li>

                <li>
                    <a href="/marking">
                        <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                        <span class="title">Marking</span>
                    </a>
                </li>

                <li>
                    <a href="/signout">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>

                <div>
                    <img src=" {{  URL::asset('dist/img/logo.png') }} " id="obe-logo" width="120" height="80">

                </div>


            </ul>
        </div>
    </div>

    <!-- =============================== Main =============================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <!-- <div class="search">
                <label for="">
                    <input type="text" placeholder="Search anything">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div> -->
        </div>

        <!-- ================================ Cards ================================ -->

        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">1500</div>
                    <div class="cardName">Viewed Courses</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">5400</div>
                    <div class="cardName">Joined Courses</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">270</div>
                    <div class="cardName">Comments</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
            </div>

            <!-- ========================== Course Details List ==========================  -->
            {{-- <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Courses Summary</h2>
                        <a href="" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Course Name</th>
                                <th>Program Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>OOP</td>
                                <td>BCSE</td>
                                <td><span class="status delivered">Approved</span></td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>English</td>
                                <td>BCSE</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>

                            <!-- <tr>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status inProgress">Pending</span></td>
                            </tr>

                            <tr>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
    </div>

    <!-- ================= ionicons ================= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- ================= Scripts ================= -->

    <script src="assets/js/main.js"></script>
    <script src="{{ URL::asset('dist/js/main.js') }}"></script>
</body>
</html>
