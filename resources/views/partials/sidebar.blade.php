<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="#" class="navbar-brand">
            <!--Logo start-->
            <!--logo End-->
            
            <!--Logo start-->
            <div class="logo-main align-items-center">
                <div class="logo-normal">
                    <img src="{{ asset('assets/images/logo.png') }}" width="80%" alt="GTMS Logo">
                </div>
                <div class="logo-mini">
                    <img src="{{ asset('assets/images/logo.png') }}" width="50%" alt="GTMS Logo">
                </div>
            </div>
            <!--logo End-->
            
            {{-- <h4 class="logo-title">Hope UI</h4> --}}
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Admin Sidebar Menu Start -->
            @if(request()->is('admin*'))
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Home</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    
                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Manage</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/live-tracking') ? 'active' : '' }}" href="{{ route('live-tracking') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('admin/live-tracking'))
                                        <rect width="30" height="30" fill="url(#pattern0_35_537)"/>
                                        <defs>
                                            <pattern id="pattern0_35_537" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_35_537" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_35_537" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABbElEQVR4nO2WMU4CQRhGFwslMSZQUYiFWqqX4CRgraGjhgsYiEZbqbyAYKUBvIFoSesBELURn/mTMZliZnZ2Zul4Cclm5+N7MLP8IUnWOABOgB7wCizUS667wHGSN8AWcA0ssfMDXAGbeUqf8OcxFzlwQ3Yu8zjTZYBYtv0oRtwjnIsY8Zul9B7YBarA0JKZxojnltKqltmzZOYx4q8I8WeMeGopHaptFumDJfMSI+4QTidGXAG+A6TynkqwWADOA8RnSSxAAbjLIJVsIVosyOwFBh7SQfCcBjaAsVbWUveLjmGBWiuqbEu7P5JOH3HNUNrU5BPD+kSTNg3rNR9x3/VzAMrAu1Yq12VLtq0y/TTpjvpX8QscOnJ1TVx35A5U10K6XeKGKhunfMCSJi6lZOWMhYYr9P9QnbrKVPZZztYj5/4ywL7XtmQE2AY+rMenzWX3gxAmv1XdbdPijNUzM4n1obEqRnnv5pokjT+ehV0YaorwjAAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_35_534)"/>
                                        <defs>
                                            <pattern id="pattern0_35_534" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_35_534" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_35_534" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB9klEQVR4nO2Wu07cUBBATQpAipBIRQEUCWXgJ/IlQE1ER2so0PqOA+yMeTRIG8jOLNo6LBURjz8ISUnLBxAeTZKNZrMmK/C1vddOx0gjWfbcOXeeu573LCkSRPUZg4yA/M2Q3KjqM6BUw+rBtFe2ILaGDMk2kPwCknaSGuSfhnjT95uDpUGB5IsNmHCB41LggLyTF/qgKFHhmkJKetPSHmzKW2ew0UbqN9qHqHndHUzy3RLR57W15niAnyYMcivRhvjCGQwk10lOFRjbfNhqTFqivi4QMd85g5Fvi4AvLKluKVyhhvjI0tlfncFAsuLcXCQrzuDVqowByr3DHN/rWWewCqC87xccEC94RaXdbg8Ykkbu5UHS0DNeGeL7zUEgOcwBPnTe077vvzAopz3Oljrva7Vh27KIO11t1FbP9Hw7UZ+Z4JDk3ROnES/GcEA+S5jZsxiqto+/q89MsEHZSxuHyja/MiRXPTW90nfJvnj5bzZkLx1qdkc6/yyQfwM2pmx2QPXZfxHVZ212lXV+o746Ps3uiBUcRDzXveFp2gU3NmqjMVif02y1xp0Ri3jOahQ3lUGZT3PWdXiutc2yywwmpP3XudLSp4Th/ktA/mEtX7yXMxvBQYD4Y3fklpPAlwV+EPLq5RPwo6Xxv/Sk7Gw+i5clfwBzyqKv0GVRTgAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Live Tracking</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/collection-schedule') ? 'active' : '' }}"  href="{{ route('collection-schedule') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('admin/collection-schedule'))
                                        <rect width="30" height="30" fill="url(#pattern0_18_1468)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1468" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1468" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1468" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABKklEQVR4nO2WwUpCURCGzz4DUfBhotDciIT0KK1C3PVGSj2ECAqFb1At3ElBq4gvJkYYDtfbufeOtfD+cBYzZ/g/zsw9hxtCraMTcAW84qcXYJgClkJvPaeAf+TUwHQ/avBft9pboQbHyunWGXBeNg4VwGJyUTYOFcCVFP4LDLRTwUVn+ps2wCgFXHSmO02BLnCiqwfMdO8TGByi1bfGZwHMTTzWmi3Q9ARPs3yi3L2mJ54z7iaALzX96Dnjxh6fjsmdau7Ds9UxeK359e4qGfCb569PL/LpGPiN5voar7LAw5LwWYZXW6BAS+MHrb0LVaXm8jiIxjl1E3Od8l+xAvCRPg7olZGvt6Grb076BVy7QA18oKfZJ9nzhRp4U1v6JFcGeAeWMtO4vd+FI7oP5YInBAAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_18_1478)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1478" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1478" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1478" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABiUlEQVR4nO2Wz0rDQBDGc1dBFHwYqfjnIiLio3iS0pOeJLOhtDsRT4JYOhPopVIfQgQFpW+gHryVCp5ElEk2ocTWpHHx0gzMYZdlfpnv2x3iOGXMXHjIu4D0opC/LOWzh8FOJlgOWoSGCZqe8oDDw5YEzF9PleD/llpZTqcEp2OSVK4OVt0mVYquncLgJlUAg7Wia2fmLteJf7mcCzyth9lJr56mvWzwlB4mqbkLmtY9rzUXph9sAPKVgX+4Pm1blxqQDpM6mm8V8k28Bk3V6AwPGo2LRXtgzd1xdUb3ALkX2cQ1ax6LvJlg3d6MPpIerHl8dNqZH1fHO2utJGA4XzDgd2tSp8GA1De+9+OnFIMBeWjt10du72gd6TSB+3QQ7iFvmY7vf4Dlx6wIXJ5MupZ0KtB6vbMUNqX52tyHY+evIcVlOJiC1UnnXM21+DllTrG8IRNJhoMp3JPbK55LhvLqqFOF/Kl0e98KNA6ZSNLNL1YMrEPjkIkkkgLSozwZhfwGyHfiaVrebyymju+PVqesAAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Collection Schedule</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/waste-composition') ? 'active' : '' }}"  href="{{ route('waste-composition') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('admin/waste-composition'))
                                        <rect width="30" height="30" fill="url(#pattern0_18_1470)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1470" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1470" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1470" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA8UlEQVR4nO2VOw7CMBAFLXIHJMTvJBQICjgMnCfn4NsnF6AAOkCCmg6JcpClLYwJyRYJBfFIkeL1847tIjEmUEuAPrAEHnzyBNZAT3JrqfnYtQub0Uoj4Egxe+CgyNlMQyMeyIIz0MxoZGsXZ6zJDTTiuYRjGd+cZlepxU5Nk5trxG9hYCpNr8DE25w2F2vEqYRHOZmxI9bkEo34LuFWTqbliDW5u0ZcCSaIfcJVCzN58lgBbaADbPxJU0RGw518vyN5/0bH6dEtQzx05oa/Ep/sSZ25SH4KWWzkmq10W8aJS8EEsU8trzqtwJsUigN/xwtBiLO+t6fZMAAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_18_1479)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1479" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1479" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1479" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABUElEQVR4nO2VwUoDMRCGF30HQbT6JB5ED/ow9hX22mRt6QwqPdvOLOSott7tC/Sg3lTQszfBozJpU9st20SrHjQDgWzy5f8nITtJkhj/MrKjzqYGPlfILxr5baoBv2rkbq1pNiyH3B2NTXGyViGfCRNkaoxZ1ki3M4YzCdC1Qr7xccKkabrkNVaYb9kFwPfZyelKUWg4Rg9j4QBONP3HjFwdCbbkWyM/fZjQo00OuDVh7OVE07/jApxhvi+iIqaB9yaTC+VccnNDI/ct3Mx3yhnaHe8uhAO68u8Y6VngRqO9WsbInDMO4UTTa+y9zV9sSTQuRjxqPazPB7bNK41AF/W6WatBe10B9Ra/XEADqd+2hgMNyozF0GkcHueVhY0VdLbdnPR/y/hOdurmpC+PQslR98RcTBXSZfyPk09frlgy8eceif63HzUEvMcx/ly8A6VGlFYGTPzYAAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Waste Composition</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/waste-conversion') ? 'active' : '' }}"  href="{{ route('waste-conversion') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('admin/waste-conversion'))
                                        <rect width="30" height="30" fill="url(#pattern0_18_1471)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1471" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1471" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1471" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB3klEQVR4nO3WS4hPURzA8Wu8mSFKsiKP2NDYKWVnQ7JQCKUoKwtFWSmRhZpZ2HgvLVhaWHot0CysZEUSeYVisvCIj25z/rqOc8//zh2zm+/m/zi/3+97z7m/czpFMcEEEZiK89K8x5ZirGAazuILXuM4JmEWXtTI32HOWMUXE4W3h7E96jmNndjYRroE3xNFn2F6mPlQRv4ZvW1nvAZ3o4I/sDyMr8evGvG5VtIqZcPgeSg4EI1dqxGvLf4H6MUx9IXfPdiPNwnpUBvBlHIpsRmHcQErauJWYSuOhLhbeIl9UezkbvtzEN8SMxgc9QxGas7GCTwqG7Jb8M2E+CNmjkJYdvyuMPsOR3MJuS7d21C6DPcS+U9zSamEDg8aiufjQyJ/OLc8wzXSK7iD/obyg4kaV3MJZXPFvO2cvViQye2JOv5xyC9f3Q3MzYn78CoS/7U1Mrknm8TVgt0V6cPqTDI5m/Az8wpXdq0TAm8H8YbwX3mQ/CGKX1zTTFUGuj18p9hqXA/fF+JTSowZYVVylGfAvEbiUHRp+DwVV6rEXNadQ42l0QOcyYjL8znHk/IW01b8z2kWXY3uZ8TbWkk7YEdlX8bNtSjcx6qUN5dLxXiDdfg67qIUOJAcmKAY4TcX3HlpWQfzUwAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_18_1476)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1476" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1476" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1476" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACmElEQVR4nO2WT6hMcRTHL57/7xElWZE/sSF2StnZ0MtCIZSirCwUZaUrmjdzfnf+nTPTY3j16s09Z7g7ih3DAr2FlaxIIv9C8bLwJ0a/+cOdO/d33TePXup963bv7Z5zPnN+v3PO/CxrSlMKqFQqzQSU84qkFryA5K2D3G9NVLbtzQKSQSD5BCQvAfl0rVabZpeuzgPkZ6FwlDeI5QUTAgPyhWBgB2W3/qZIDoSBG3AGJ897UwXZNm5oMldZAShfQzJ6gnh9ts5coYwa4SQf7aLX21XGKi8bAOV2e1D+NlAcWd3I2t0CyD9C4cjnrInKQe4HlKfNgGn/NyC+HAZOo2yy/obsoteriE8BDPXV3217ukPuYUB+1ZmtjI4fYFd79FI6JDuA5LgiKUGe14TZpYnXKXR3Kqyc0HaK5KYieQ4oh/y2nufNiO5Pkowi/hJSKJmutsgZmQ8oZ4D4gS7ISGNAvtEJ5veZjDc3LrBe8YXKPp29r8VOGh2iqjSVl4NxoAorqxTxnZAf/zgC3Ongu+7FAWcy3mKF8i7Ef8y8PCRjBqirSG6pnLsxDjxFfDSkry8ZHRrFFYTy69bsTaC3xOSr2+v3c7UHSB4291Zv3bVUyVtoBsNQn0J+ERiRba1hkkI+G8fOKEDe71ue+/5MjD553q5Ivpu2EHLltX+MUzdErtb/iXLu1nrgxiD5tQp+e6foLjcUk39/01YcpQrueoV8RT8n8rJUIX8IA9vDw3P0qkRB9QxIDvIiK66SWV6p7wolEQzWsgGUochMG3P7WGyoX4CMJnBzPkdBH+lTTFfgsGnWdjRCuWsEF3hXV9CWgCp7Wn0ZLK5strxMn8cCLahPLhetf60UljcD8WdrMgTIRyYFbP0v+gnZOwPMmOyIkwAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Waste Conversion</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/dump-trucks') ? 'active' : '' }}"  href="{{ route('dump-trucks') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('admin/dump-trucks'))
                                        <rect width="30" height="30" fill="url(#pattern0_18_1466)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1466" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1466" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1466" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA6klEQVR4nO2VTQ4BQRCFZ48dKzcZHGCw5Sp+rmPnGCQIN7A0Nqxt+aRjInQqlW7TJJJ+u5pKva/zqtOTJFFRvxTQAvboyoEsJLQBnHHTISR4jodCQYc+0CBg5IhToK3UTzDQA47C2W7AGmg6R/zSE2vrm7lsmmYSdKDF6AiWlGoR14HTN8DKZhM74rcdfhuMKyiCHS6XqEQYMPvteNTBwN6KYJ+oc6E3AirA2MlEXpnmsTQDmQCvFma1EmDNY2E/JpuiMTGDwLSoV+orVNYD6ANX63Sm7nqAP/PgMbgDLsDW/GddoSE9ov5fdw2M8hI3QlDdAAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_18_1485)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1485" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1485" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1485" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABO0lEQVR4nO2Vv07DMBDGswMbTLxJKQ9QYKWvwp+FqVLv3ErxlZEJehcpjwESIHgDRtKlnVkLyFSgNk0cN7hISD7phkt038/57JyjKESIvwyk4R6SvCDJhyUzRUnLG7Sj0x0knlRAvxI0v3oDo5bUBfqdXqBKS3sVqBdwp8Dirk4a3ZibZfU8WJEcAvGoYDvekeSh3093nS3+eVdS555lFefhZhk64GObjY7gpX7jUKnFvR5vg5bxOsCWnY0WLM7v4XrB5P6FAYwVVlv/fZw/hTE3gZJ919obGGtkAOMKVmcF4+1EqesNJD6ta3WFxl1kLvM8/OIy3TRiAFdbdcFWDc23C8MEiB9nE0zOTCMQn89WL/fWKfRbDRgMj5BkmlvhFGI+cAbX1QDTqPkZSN6A+Mncs65Qnxoh/n98AjbiDus8mUtjAAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Dump Trucks</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/barangay') ? 'active' : '' }}"  href="{{ route('barangay') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('admin/barangay'))
                                        <rect width="30" height="30" fill="url(#pattern0_18_1464)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1464" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1464" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1464" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAuklEQVR4nO3Sv4kCQRiG8c0ODLUDWzDzTxm2YAUaepEm14Et2IKZpnZgCwsbCRrI71jYTNj77hhdOfeBCYYZ3ofvncmyllcFPSxwqtYc3UcKB9jg7J4Lthilkn1gip04R8zQ+Yuwjy/kNYIhxjXneZXRj0o/cQtMVkongXtl1jIiLqSniIjXuCaUllmrUN3viYpU+zCtWFt1RfRPhHkfMQ7Sc2hKvP9F2f8dj6n457f2HPG+kVZbsib4Br+IgIuNC/dCAAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_18_1481)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1481" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1481" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1481" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA/ElEQVR4nO2UMW7CQBBF6ZAoww1yBToSjsEVOAGUQAOJ9wsjZlxRIjFjyWWKNHRJmxtwBSQqJCgQyApFFMnyWtgkwvulKbbYebv/706l4vRf9RIs6oalB9L1d4Vd348eCgNOSBpgnYNkB9bTzzIse5BG4OVTLjCi9yoCaRvS1W9YUhnWL0PSGc7fapmBr1N5BClAukkCeBQ2vZk8Jx4i3kuKuJcV1JAMwHpMu1kMNRy2LFw4gqWfDmbd2tqawf5tKhikY7Ac8gPLwbCOrOwup3CxKq+1tRwYzmp2j0uv+05g/cx7Vsc9/wZM8mE/Qe5eKCbb9KxxCzC5rMukM3yLFpPeamNGAAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Barangay</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/notifications') ? 'active' : '' }}"  href="{{ route('notifications') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('admin/notifications'))
                                        <rect width="30" height="30" fill="url(#pattern0_18_1461)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1461" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1461" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1461" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABKUlEQVR4nO3VPUoDQRgG4K1SaWnEQmMrsRMPIYhXCyoeQLyFgohCIsFCFLXRgIpeIKKN8sjIFmtg3d8Ei7zd7gzz8O03OxNF00yTErSxjRu84QO32MUqtvCKZ2xEVYMG9vAlPWHsPfH8VBWdwYnieamCzuKsBBoq3yyLzqOrXD6xUgZdDz1SLZ0i4DIOMjZR3lxlYae4QBNLeFBPhllwP554XTM+zILnwmeJJ99hAYu4rwhf5ultM664zso7mfAY8PA7tXPBNeM7udEa8XC8NsrALZwnFiqCh+N1pjAaknIh5MG7pdGQ+J6VgQ9Gxh7DWFQlOBpZtJfS80FiB69VQhM9PowrP46R5h/4fjTOSMdbY4XTjtdoUvG78v7E4AQertLez4tp/lu+Ael7Q+NPJQTiAAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_18_1484)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1484" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1484" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1484" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABmUlEQVR4nO3VvUrDUBQH8Ds56ajioHWVuokPIYiv1KnYc1PanNPUyUXbeyJ5BAUpFlRKB1HURQUVfQFFF4ty+6GtJGm+LA79wx2SDL+ce05uhBhnHI/kLE4DKgTiSyB+lcjvktSVRC4Z5t4ylHgDiJ8l8aNB9pqIm0zGmZDIZUncksSfHqsFpN5614DqIR5qOZOSuOYDui9UT5FRgO0pSVwPi+rKoVRdj4RmTZ4F5OPQlXa2+SNXtJdCo4ZZWdU9ioL2VV0MDG4W7UVAVRkyRAF7zOe+mER1BMRNY2t3Jmc6C5L4NjbaGa4XXxhINbpbc5EojkPgLDrTels6Q8HXhUJlLl+254HUTUz4bGhvdaW64iQrDzxcSeLtz8nidCA4SRxIUWA0Qbymz/bwsFVNAanTvrcPg9f12S6iRLr8EILg+niNjOq0/7PuffvGAflu8Lm6189EnADywS/0xK3nPVxPcB7Viogbw6qmJKr9buWHGvEaOI0D8k5s1C9euH5R8dfJuhyvYlQxBitvjAz+wbmpB699Y5z/li/25Y4ksrHaBAAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/residents-concerns') ? 'active' : '' }}"  href="{{ route('residents-concerns') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('admin/residents-concerns'))
                                        <rect width="30" height="30" fill="url(#pattern0_18_1469)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1469" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1469" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1469" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABnUlEQVR4nO3WzUtVQRjHccNF7Vpki+jNXUYl1DKMSC8VLYSivyIobNWqfyS5/QFBtKrWZWDhwo2SXmqnC18gE3sPP3FgwKM4xzn3TuLCH5zNwzy/78w8c56Zrq597RXhNB7iNT5jLXyf8AojOJUTeAJP8dvOKsY0cbxT6C0sq68l3GwXOow/2tdf3KkLvYgfOtd39KdCD+CtfHpXeKaAr8uvRgq4GUm+nJA7EMkdTQFPR5IHEnKvRHKnUsCr8ms1Bfz1P4BXUsBTdWtcUdtaW92sW+OK2m46XBhEX8xkSH4NlRbVwqFYAxnLCB0LnofxJcRGYqs+n6llfsOF4Pm4FH+/Uwf72eElcTt4nQt9O+33wrj2tIgbwePINk1ppQraaAP4C09wLHgcxeQ248Zj0H4slAZ+wFXcw0t8LD19WiF2HydLHtcwF5nggxi4FZKeF5d50rW2kXsWz7Aegc7iYKpfFagnlOVR2JkqreFMx9AA7sWbxDOwXnSvLODSBBqhM82U6j8TYhNbHoKXssIrJtWNu3iB+eIM7Qp4T+ofbWXJ11AKmMoAAAAASUVORK5CYII="/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_18_1477)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1477" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1477" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1477" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACSElEQVR4nO2Wv2sUURDHVyy0s1AL8Wenoga0lIj4gygWguJfISixshIr9c27TW5nNhYmnEHuZjYsiJWx1ghRLGwixqCdFhpBDfF3yMnbS7zDvL39cUtI4cBrlvfm877znZ1dx/kfKyVKA7XtQHIJiB9okjdAMttY/BqQRzVKr/LCbYUBFVa3aJTbgPJLk9TbrcYervT1hZs7goLHpzTKxyTgkguQTGuUk/mgvpzWxL+zQpvqeU5R7WwmqIuyX6N8zwttKudv2pOuVNB6vb5KIz/qFNri+2OTMxGsMegpCtpcfDwZTFyxHVYYHEw6qzzujoEPJYKB5IUV7HF38tngkBWMPJFCscwUX2qZSaP4S+Fg5M/JipEnsnrcxtsspeZKVo9jvf2nuUokR13iXfYkXnCs6FKbnC2ipq4OD6+1DxCSsQLBYyanuhWuA5JPjdJLr1V1yRvZW8TI1MhflV/bt6D2yt8KED+J9xqDHiD+kbu8yHPakzNR8w3InmhuU8rXS5OM5wPzB+XzCZPjun9n/ZKhhG1eLzNfcwB/AvJgf391k8lxDcONQPLcsnfcDvWkC1DeN28oTwH5MBCf1yT3AeXl4q+P6VLzTKNccG8GWxdzANaOAPFb2wVLJBfjSjwVHUK5az7mqT5rC6HKwW6NEgLyfIz3rxBH1zidhuvyBmMLIF82lWnbcCSzUK7udIqIG+VgB6A8TNnp82Z6OUVGoxmjyTTZ4v9k9Az5WYvqafBHDjjLEWEYrlYo5zTKPY38zvTQsoBXZPwBwf6jRG7aWlkAAAAASUVORK5CYII="/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Residents Concerns</span>
                        </a>
                    </li>
                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Others</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}"  href="{{ route('users.index') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('admin/users'))
                                        <rect width="30" height="30" fill="url(#pattern0_18_1465)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1465" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1465" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1465" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB0ElEQVR4nO2VO0tcURSFx2eEiEVKsbOID8RCC9P6CwzRjKQQEUTQQizESksrFYJYRdBE/QWCRLRRiF2aFFqJCmoTmc7G1yd7WBcOh+OZGx2rzCrX3mutmc3e52YyJZTwXwMoA0aA38A18Bf4ClS8dvAcYfwB+ooR8A7Y1b/6Ia4RuOdp3AD16t2Qdse80ob2A5eO4aL4LxTGkHqXHO4CyBYKfQPkPLNZ1SZTBE+pd9bjc0B1LLg9YJaMuidF8Ef1fg/U2mLBnQHB0j8E9wRGnaAzFlwH3HmCFdWyKYLzmw2sevydeceCWwNmthxVQDmwHgldU0+1t5wJWmPBFnAUEM2p3qwz8WHc+8itH5r3k8ES9gWEt0CD6gOB+oBqDer18SkaKrGNa8sT/rTnUvXugHG386RuezXzKi8YLIMxiU6BQaBSfG3AOPlhteqplMa0htG0oR+Ac93iW3G2MMOOWQin6sk/FKa1N0BeXbHADmATeAC+OaP9DJyRHmfOWdnol+Vp3h1+6Ixzv8d6Ok20wPMxL48a4EScZUy7HwUX4+J7eTny2wxMeHzWyAOPbFLzfhGC9+TV4vG/MoGvUbJQV0UIvnKuwUUu1aaXUELmGXgEQ5Pm6xNoGRkAAAAASUVORK5CYII="/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_18_1480)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1480" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1480" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1480" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACg0lEQVR4nO2VvWsUURDAT41RUCwsJZ2FH0EsTKGtf4Gi8cQiiBAELcRCrHS7eO/dncnMXopD4TR7MyvbBg5FIShoZ2OhlWjA2BiuS6PRk3nvNrl7t3t7JFh5A9u8eW9+87253FCG8l9Lq9XaoZGua6D3GmhNIf9QQBBF0a5/CtZAJY3c6vmAP2ifJrcNKJejgxrplUSlkRYsNDyskX8ngpFbCvin8vmQ3FVAZDIC/FJsDQQtztFlhfy9IxrfgP3wShq0A37NOsnzm+9pRWGY7wsFaOzRwM1ugzRjokC6kw2muwaMNOOUoul50Wgq+AE+O9lr0KZaIZ3LAus5Pm9TzU9dXcGvn0gFK58nEhpnflCw3OlJdazzeaJPqoMDCmjdqVvNgsN8ZsTtztZIT5wSrIvtVHChwuO9EdNKtVrd7XneTo1c71PfQO5ILbuaM051hcdTwQJQwJ8S4CXj2Gx4zI5Yj35NzQZH0medPortVLB56NNkwsNfBQjG2mmcStBPGccgGJO7CSW4kMsSSZcCajgN9lzWpeiLyGddw3ImOrmjkF44JWiIzUywTRffbDfWV431q563NGKcqkT7XcOxY6Kzji+NyBv71nT6jcGgPp1RSN9kFovFhX3WWDSqkadjYylbS3TT8aKQt7IDxFYBgtOpwBLQKQ28qID+aORHG6kFvqSRljNHabPey/FYmdQDPzY2gReF0QVVQPc75vezrE7zCwR6ODjQXSZcFhterbZXI32J51kj3dv4KXRvGLol5wXgi1uFut2skG93OxXmZa++6zwsIR21DUZvtgtWwK9tuYLjTjne5ty/UdxQGnh12xEDr8bToLvPmwN1+lCGktuC/AX+OwAg13xW8gAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Users</span>
                        </a>
                    </li>
                    <li class="nav-item mb-5">
                        <a class="nav-link {{ request()->is('admin/help') ? 'active' : '' }}"  href="{{ route('help') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('admin/help'))
                                        <rect width="30" height="30" fill="url(#pattern0_18_1472)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1472" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1472" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1472" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABbklEQVR4nO2WS0oDQRCG5wJxEQw+I97Eta+gBFeeQGPixou4DOrG6Mb9qBfwCjruJJ7Aibgwj08aajGIVFfPjOgiPzQMTf39UTXVjyia6r8JWAHawD2QAO8yEpk7AuplApeALjDCrzFwA6wWhe4AA8KVAo280GPJIK+ct5Mn03EBaBZuyxxY9pS3DzSBioxdaTCt7IsW8IUHWv3BUwVeFd+ZZcto3duUuA0BubEuc3uKb+QqqYHdPtVUkbhsdn2Zm/F4Wxr4jnC9iHfWExdr4OdA6AewJt59T2yigV0HWvUJbIpv3tNcTmlZ4BPxzAGPhvi0rFLXxPNgjE/Kbi6rYg3srrbf0oEGrgdcfz0ZE0P8UD1ABH5uWKiXib8yxHdVaObiT0sEvwELXrAs1vBcixMBXntK7dbYNkEz8E4JD4F2EPRb5iGHSra8W1ERATXgVDrTkuWl+Z8GvExawC3wJK+UgXzHwKF3y0wV/YG+AJlKDn64Wor4AAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_18_1473)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1473" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1473" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1473" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB8ElEQVR4nO2WS04bQRCG5wJkgUDhkaDchDVPgVBWOUFCgE2uYOFq2zBVQxYIssm4ytLsnXABrgDODsEJMIgFb9XYPGRpunviiciCkkoatbrm6/q7uquD4NX+NyuHyYRBWTEoe4akBSTn6vqtY2Xir9XvjfeFAWu1ZNyQbAPytSG5c/iNQUnWNxsf+oIC8YJBPvMA9nobIpn/O2jEa2kG+aGP2VdIVvNnSn1BH+HemZcxfmeTF5CPTcRLALsD6iaUxbTA7LKPOcGG+IcNWqslg70xOmZITizwHXu2YTJhrd6Il9KtCHm6CzqpUGMqXXDEHy0LvlYls7PVc2rZM5W2o8pTdqqCjiHGb6z7jbKcCQbi33kLCFCONLZa5SHH3GY2GPlPLijxBSBPdmM/Oea3sqUmaefI9LJCMpPGbSUjjuK6038XAjbY+KYxpVDeGuIDj5h2IVKXMBnuLJb3PWNahRZXDm9mgrW1/TMw8udMsPZT3/YHyHHXb93z+cp6gXT2WXbdFc3xs4Kseyx0O/Bs/O2iwEByurERjzrBadaRzNvaYlfeOiCzQ+qbCvKcF/TBtIn3+xDQuz8XtCdz/0vlmbwQ1WeDfqyEyTAgo1amV5bEP7331P9lIsuA/AtQDtNXCvJZ+k3SBOIvziPzasEL2D3ftc7cRd4htgAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Help</span>
                        </a>
                    </li>
                </ul>
                <!-- Admin Sidebar Menu End -->        
            @elseif(request()->is('landfill*'))
                {{-- Landfill Sidebar Menu Start --}}
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Home</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('landfill/dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('lf.dashboard') }}">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Manage</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('landfill/waste-collection') ? 'active' : '' }}" href="{{ route('lf.waste-collection') }}">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('landfill/waste-collection'))
                                        <rect width="30" height="30" fill="url(#pattern0_35_742)"/>
                                        <defs>
                                            <pattern id="pattern0_35_742" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_35_742" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_35_742" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA+UlEQVR4nO3TsS4EURiG4SU6UUkUouEiJNuKgso1uAGtBkFC5zJWIuECtFaIROECNBZxATrFPiI5xckYu2vmnJDNvMkU55//O2/mS6bVaviv4NZ3blJd3pWO7l+Jr5K0Mb5IRCMeyohNvuIB9+F5y1n1E7awUJI5ziXuYHpAJov4ApNDMsnF75iL3u3gDrOFzElq8Wk03wuzDywVMp3U4gNMYDec+9gsyTymFp/hPDrvl+y3i9IUYlG9219fX9idwrUM4j4usVyyNxMakUPcjubzWMEGjvDykzSFeBWLOAy/1sjUFVemivhZfXpVxOs15T2s/VrcMDZ8Ahr39MvbL0t5AAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_35_1252)"/>
                                        <defs>
                                            <pattern id="pattern0_35_1252" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_35_1252" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_35_1252" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABSElEQVR4nO2VvUrEUBCFV7ETK8FCbPQhhG3FQiufwRewtVGjgmvmXhRmAlY2Rs+IoA9gJbiiCBY+gI1/+AB2W2wksi4xiz/L3osScmCqzJmPnNzcqVRK/VcZ0SsjmmSLWC9dDa/nh/dQ9b8BM86dpFFcGUdRl+Af9csT+2wYtyR6816MF49R496KLoS8P9bpQc0LmBiwNh782uMDzHoSBEH/9x7XYMar3YlHPp6R6JJhva5Fe8NZD4luuQZrezhjpbUYGpvbmPgEZsB11GtJkvQZwXLrWzfDCPN5DwnunIJJcESsx5lDttrRH6Hq7eYi1gYxFtO3z/YGwdkAsV44BxOjSYLTUDCZ7yPaHUoT8XNXR6i2QZGOWtEpwwdzhnWDBE8elwSmrcTjxLqe/lqF3U6PvUKJ8dA12MrhbC/wFGpYZ7oGlyqM3gCcG2U+i15rLgAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Waste Collection</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('landfill/recycled-products') ? 'active' : '' }}" href="{{ route('lf.recycled-products') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('landfill/recycled-products'))
                                        <rect width="30" height="30" fill="url(#pattern0_35_525)"/>
                                        <defs>
                                            <pattern id="pattern0_35_525" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_35_525" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_35_525" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB3klEQVR4nO3WS4hPURzA8Wu8mSFKsiKP2NDYKWVnQ7JQCKUoKwtFWSmRhZpZ2HgvLVhaWHot0CysZEUSeYVisvCIj25z/rqOc8//zh2zm+/m/zi/3+97z7m/czpFMcEEEZiK89K8x5ZirGAazuILXuM4JmEWXtTI32HOWMUXE4W3h7E96jmNndjYRroE3xNFn2F6mPlQRv4ZvW1nvAZ3o4I/sDyMr8evGvG5VtIqZcPgeSg4EI1dqxGvLf4H6MUx9IXfPdiPNwnpUBvBlHIpsRmHcQErauJWYSuOhLhbeIl9UezkbvtzEN8SMxgc9QxGas7GCTwqG7Jb8M2E+CNmjkJYdvyuMPsOR3MJuS7d21C6DPcS+U9zSamEDg8aiufjQyJ/OLc8wzXSK7iD/obyg4kaV3MJZXPFvO2cvViQye2JOv5xyC9f3Q3MzYn78CoS/7U1Mrknm8TVgt0V6cPqTDI5m/Az8wpXdq0TAm8H8YbwX3mQ/CGKX1zTTFUGuj18p9hqXA/fF+JTSowZYVVylGfAvEbiUHRp+DwVV6rEXNadQ42l0QOcyYjL8znHk/IW01b8z2kWXY3uZ8TbWkk7YEdlX8bNtSjcx6qUN5dLxXiDdfg67qIUOJAcmKAY4TcX3HlpWQfzUwAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_35_528)"/>
                                        <defs>
                                            <pattern id="pattern0_35_528" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_35_528" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_35_528" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACmElEQVR4nO2WT6hMcRTHL57/7xElWZE/sSF2StnZ0MtCIZSirCwUZaUrmjdzfnf+nTPTY3j16s09Z7g7ih3DAr2FlaxIIv9C8bLwJ0a/+cOdO/d33TePXup963bv7Z5zPnN+v3PO/CxrSlMKqFQqzQSU84qkFryA5K2D3G9NVLbtzQKSQSD5BCQvAfl0rVabZpeuzgPkZ6FwlDeI5QUTAgPyhWBgB2W3/qZIDoSBG3AGJ897UwXZNm5oMldZAShfQzJ6gnh9ts5coYwa4SQf7aLX21XGKi8bAOV2e1D+NlAcWd3I2t0CyD9C4cjnrInKQe4HlKfNgGn/NyC+HAZOo2yy/obsoteriE8BDPXV3217ukPuYUB+1ZmtjI4fYFd79FI6JDuA5LgiKUGe14TZpYnXKXR3Kqyc0HaK5KYieQ4oh/y2nufNiO5Pkowi/hJSKJmutsgZmQ8oZ4D4gS7ISGNAvtEJ5veZjDc3LrBe8YXKPp29r8VOGh2iqjSVl4NxoAorqxTxnZAf/zgC3Ongu+7FAWcy3mKF8i7Ef8y8PCRjBqirSG6pnLsxDjxFfDSkry8ZHRrFFYTy69bsTaC3xOSr2+v3c7UHSB4291Zv3bVUyVtoBsNQn0J+ERiRba1hkkI+G8fOKEDe71ue+/5MjD553q5Ivpu2EHLltX+MUzdErtb/iXLu1nrgxiD5tQp+e6foLjcUk39/01YcpQrueoV8RT8n8rJUIX8IA9vDw3P0qkRB9QxIDvIiK66SWV6p7wolEQzWsgGUochMG3P7WGyoX4CMJnBzPkdBH+lTTFfgsGnWdjRCuWsEF3hXV9CWgCp7Wn0ZLK5strxMn8cCLahPLhetf60UljcD8WdrMgTIRyYFbP0v+gnZOwPMmOyIkwAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Recycled Products</span>
                        </a>
                    </li>
                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Others</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item mb-5">
                        <a class="nav-link {{ request()->is('landfill/help') ? 'active' : '' }}"  href="{{ route('lf.help') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('landfill/help'))
                                        <rect width="30" height="30" fill="url(#pattern0_18_1472)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1472" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1472" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1472" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABbklEQVR4nO2WS0oDQRCG5wJxEQw+I97Eta+gBFeeQGPixou4DOrG6Mb9qBfwCjruJJ7Aibgwj08aajGIVFfPjOgiPzQMTf39UTXVjyia6r8JWAHawD2QAO8yEpk7AuplApeALjDCrzFwA6wWhe4AA8KVAo280GPJIK+ct5Mn03EBaBZuyxxY9pS3DzSBioxdaTCt7IsW8IUHWv3BUwVeFd+ZZcto3duUuA0BubEuc3uKb+QqqYHdPtVUkbhsdn2Zm/F4Wxr4jnC9iHfWExdr4OdA6AewJt59T2yigV0HWvUJbIpv3tNcTmlZ4BPxzAGPhvi0rFLXxPNgjE/Kbi6rYg3srrbf0oEGrgdcfz0ZE0P8UD1ABH5uWKiXib8yxHdVaObiT0sEvwELXrAs1vBcixMBXntK7dbYNkEz8E4JD4F2EPRb5iGHSra8W1ERATXgVDrTkuWl+Z8GvExawC3wJK+UgXzHwKF3y0wV/YG+AJlKDn64Wor4AAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_18_1473)"/>
                                        <defs>
                                            <pattern id="pattern0_18_1473" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_18_1473" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_18_1473" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB8ElEQVR4nO2WS04bQRCG5wJkgUDhkaDchDVPgVBWOUFCgE2uYOFq2zBVQxYIssm4ytLsnXABrgDODsEJMIgFb9XYPGRpunviiciCkkoatbrm6/q7uquD4NX+NyuHyYRBWTEoe4akBSTn6vqtY2Xir9XvjfeFAWu1ZNyQbAPytSG5c/iNQUnWNxsf+oIC8YJBPvMA9nobIpn/O2jEa2kG+aGP2VdIVvNnSn1BH+HemZcxfmeTF5CPTcRLALsD6iaUxbTA7LKPOcGG+IcNWqslg70xOmZITizwHXu2YTJhrd6Il9KtCHm6CzqpUGMqXXDEHy0LvlYls7PVc2rZM5W2o8pTdqqCjiHGb6z7jbKcCQbi33kLCFCONLZa5SHH3GY2GPlPLijxBSBPdmM/Oea3sqUmaefI9LJCMpPGbSUjjuK6038XAjbY+KYxpVDeGuIDj5h2IVKXMBnuLJb3PWNahRZXDm9mgrW1/TMw8udMsPZT3/YHyHHXb93z+cp6gXT2WXbdFc3xs4Kseyx0O/Bs/O2iwEByurERjzrBadaRzNvaYlfeOiCzQ+qbCvKcF/TBtIn3+xDQuz8XtCdz/0vlmbwQ1WeDfqyEyTAgo1amV5bEP7331P9lIsuA/AtQDtNXCvJZ+k3SBOIvziPzasEL2D3ftc7cRd4htgAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Help</span>
                        </a>
                    </li>
                </ul>
                {{-- Landfill Sidebar Menu End --}}

            @elseif(request()->is('driver*'))
                {{-- Driver Sidebar Menu Start --}}
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Home</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('driver/dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('d.dashboard') }}">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    
                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Manage</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('driver/waste-composition') ? 'active' : '' }}" href="{{ route('d.waste-composition') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('driver/waste-composition'))
                                        <rect width="30" height="30" fill="url(#pattern0_53_2377)"/>
                                        <defs>
                                            <pattern id="pattern0_53_2377" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_53_2377" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_53_2377" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA8UlEQVR4nO2VOw7CMBAFLXIHJMTvJBQICjgMnCfn4NsnF6AAOkCCmg6JcpClLYwJyRYJBfFIkeL1847tIjEmUEuAPrAEHnzyBNZAT3JrqfnYtQub0Uoj4Egxe+CgyNlMQyMeyIIz0MxoZGsXZ6zJDTTiuYRjGd+cZlepxU5Nk5trxG9hYCpNr8DE25w2F2vEqYRHOZmxI9bkEo34LuFWTqbliDW5u0ZcCSaIfcJVCzN58lgBbaADbPxJU0RGw518vyN5/0bH6dEtQzx05oa/Ep/sSZ25SH4KWWzkmq10W8aJS8EEsU8trzqtwJsUigN/xwtBiLO+t6fZMAAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_53_2384)"/>
                                        <defs>
                                            <pattern id="pattern0_53_2384" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_53_2384" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_53_2384" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABUElEQVR4nO2VwUoDMRCGF30HQbT6JB5ED/ow9hX22mRt6QwqPdvOLOSott7tC/Sg3lTQszfBozJpU9st20SrHjQDgWzy5f8nITtJkhj/MrKjzqYGPlfILxr5baoBv2rkbq1pNiyH3B2NTXGyViGfCRNkaoxZ1ki3M4YzCdC1Qr7xccKkabrkNVaYb9kFwPfZyelKUWg4Rg9j4QBONP3HjFwdCbbkWyM/fZjQo00OuDVh7OVE07/jApxhvi+iIqaB9yaTC+VccnNDI/ct3Mx3yhnaHe8uhAO68u8Y6VngRqO9WsbInDMO4UTTa+y9zV9sSTQuRjxqPazPB7bNK41AF/W6WatBe10B9Ra/XEADqd+2hgMNyozF0GkcHueVhY0VdLbdnPR/y/hOdurmpC+PQslR98RcTBXSZfyPk09frlgy8eceif63HzUEvMcx/ly8A6VGlFYGTPzYAAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Waste Composition</span>
                        </a>
                    </li>
                    <li class="nav-item mb-5">
                        <a class="nav-link {{ request()->is('driver/collection-schedule') ? 'active' : '' }}" href="{{ route('d.collection-schedule') }}">
                            <i class="icon">
                                <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    @if(request()->is('driver/collection-schedule'))
                                        <rect width="30" height="30" fill="url(#pattern0_53_2375)"/>
                                        <defs>
                                            <pattern id="pattern0_53_2375" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_53_2375" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_53_2375" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABKklEQVR4nO2WwUpCURCGzz4DUfBhotDciIT0KK1C3PVGSj2ECAqFb1At3ElBq4gvJkYYDtfbufeOtfD+cBYzZ/g/zsw9hxtCraMTcAW84qcXYJgClkJvPaeAf+TUwHQ/avBft9pboQbHyunWGXBeNg4VwGJyUTYOFcCVFP4LDLRTwUVn+ps2wCgFXHSmO02BLnCiqwfMdO8TGByi1bfGZwHMTTzWmi3Q9ARPs3yi3L2mJ54z7iaALzX96Dnjxh6fjsmdau7Ds9UxeK359e4qGfCb569PL/LpGPiN5voar7LAw5LwWYZXW6BAS+MHrb0LVaXm8jiIxjl1E3Od8l+xAvCRPg7olZGvt6Grb076BVy7QA18oKfZJ9nzhRp4U1v6JFcGeAeWMtO4vd+FI7oP5YInBAAAAABJRU5ErkJggg=="/>
                                        </defs>
                                    @else
                                        <rect width="30" height="30" fill="url(#pattern0_53_2383)"/>
                                        <defs>
                                            <pattern id="pattern0_53_2383" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_53_2383" transform="scale(0.0333333)"/>
                                            </pattern>
                                            <image id="image0_53_2383" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABiUlEQVR4nO2Wz0rDQBDGc1dBFHwYqfjnIiLio3iS0pOeJLOhtDsRT4JYOhPopVIfQgQFpW+gHryVCp5ElEk2ocTWpHHx0gzMYZdlfpnv2x3iOGXMXHjIu4D0opC/LOWzh8FOJlgOWoSGCZqe8oDDw5YEzF9PleD/llpZTqcEp2OSVK4OVt0mVYquncLgJlUAg7Wia2fmLteJf7mcCzyth9lJr56mvWzwlB4mqbkLmtY9rzUXph9sAPKVgX+4Pm1blxqQDpM6mm8V8k28Bk3V6AwPGo2LRXtgzd1xdUb3ALkX2cQ1ax6LvJlg3d6MPpIerHl8dNqZH1fHO2utJGA4XzDgd2tSp8GA1De+9+OnFIMBeWjt10du72gd6TSB+3QQ7iFvmY7vf4Dlx6wIXJ5MupZ0KtB6vbMUNqX52tyHY+evIcVlOJiC1UnnXM21+DllTrG8IRNJhoMp3JPbK55LhvLqqFOF/Kl0e98KNA6ZSNLNL1YMrEPjkIkkkgLSozwZhfwGyHfiaVrebyymju+PVqesAAAAAElFTkSuQmCC"/>
                                        </defs>
                                    @endif
                                </svg>
                            </i>
                            <span class="item-name">Collection Schedule</span>
                        </a>
                    </li>
                </ul>
                {{-- Driver Sidebar Menu End --}}
            @endif

        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>