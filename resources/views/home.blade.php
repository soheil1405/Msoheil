@extends('layouts.app')


@section('style')

<style>
    @font-face {
    font-family: IRANMarker;
}
*{
    direction: rtl;
    text-align: right;
    font-family: IRANMarker;
}


#centerImg{
    transition: all 0.5s;
    border-radius:10px;
    margin:5px;
    width: 100%;
}
#centerImg:hover{
    opacity: 0.5;
}
.row{
    margin-top: 20px;
    background-color: rgba(229, 193, 150, 0.127);
}
.text-box{

    width: 100%;
    background-color: darkgray;
    box-shadow: 10px 10px 10px rgb(99, 98, 98);
    margin-top: 50px;
    padding: 10px 70px;
    text-align: center;
    border-right:3px solid rgb(8, 248, 8) ;
    border-radius: 10px;
    border-left:3px solid rgb(8, 248, 8) ;
}
a{
    text-decoration: none;
}
ul{
    list-style-type: none;
    direction: rtl;
    justify-content: end;
    text-align: right;
}
.mySlides {
    border-radius: 10px;
    display: none;
    width: 100%;
    height: 70vh;
}
.mainslider{
    margin-top: 70px;
    margin-bottom: 80px;
    background-position: center;
    background-size: cover;
    position: relative;
}
.slider-controllers{
    position: absolute;
    height: 100%;
    top: 45%;
    width: 100%;
    display:flex ;
    justify-content: space-between;
}
.btcontrollerleft{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 70px;
    height: 70px;
    background-color: rgba(0, 0, 0, 0.329);
    color: #ffff;
}
#newArticeTitle{
    margin-top: 30px;
    padding-bottom: 20px;
    border-bottom: 3px solid #33ffff;
}
.itemsbox{
    display: flex;
}
.newarticles{
    margin: 50px 0px;
}
.boxes{
    transition: all 0.3s;
    height: 400px;
    border-radius: 8px;
    padding: 5px;
    box-shadow: 3px 1px 10px 1px black;
    margin:10px;
}



.boxes-img{
    cursor: pointer;
    width: 100%;
    height: 250px;
    border-radius: 50%;
    border: 1px solid blue;
}
.boxtitle{
    padding: 10px 20px;
}
.boxdetail{

    width: 100%;
    justify-content: center;
    text-align: center;
    align-items: center;
    opacity:0.7 ;
}
#boxspbottum{
    margin-right: 5px;
    margin-left: 40px;
    font-size: 13px;
}

.boxes:hover{
    margin-top: -10px;
}



</style>

@endsection




@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="itemsbox">

            <div class="col-12 col-lg-2 newarticles">
              <div class="boxes">
                <img src="https://www.whittierhealth.com/wp-content/uploads/2020/07/Dr-Paul-Liguori-MD-MRM-Medical-Director-Whittier-Health-Network-Bradford-Rehabilitation-Hospital-copy.jpg" alt="آش" class="boxes-img">
                <p class="boxtitle">آش رشته</p>
                <span class="boxdetail">detail</span>
                <div class="co-view">

                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                  </svg>
                  <span id="boxspbottum">120</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                  </svg><span id="boxspbottum">12</span>

                </div>
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                  </svg><span id="boxspbottum">سهیل امینی</span>
                </div>
              </div>
            </div>



          </div>
    </div>
</div>
@endsection
