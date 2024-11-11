<div class="row2">
    <div class="row2 font_title">
      <h1>Biểu đồ bình luận</h1>
    </div>
    <div class="row2 form_content ">
      <div
              id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
      </div>
      <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
// Set Data
//           const data = google.visualization.arrayToDataTable([
//             ['Contry', 'Mhl'],
//             ['Italy',54.8],
//             ['France',48.6],
//             ['hhain',44.4],
//             ['USA',23.9],
//             ['Argentina',14.5]
//           ]);
          const data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng'],
            <?php
                foreach($listhanghoa as $hanghoa){
                    extract($hanghoa);
                    echo "['$name',$sobinhluan],";
                }
            ?>
          ]);
// Set Options
          const options = {
            title:'BIỂU ĐỒ SỐ LƯỢNG BÌNH LUẬN TRONG SẢN PHẨM',
            is3D:true
          };
// Draw
          const chart = new google.visualization.PieChart(document.getElementById('myChart'));
          chart.draw(data, options);
        }
      </script>
    </div>
  </div>