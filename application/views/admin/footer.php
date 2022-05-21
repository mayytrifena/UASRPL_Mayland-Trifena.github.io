  <footer class="footer text-center">
      <div class="container">
          <strong>
              <p align="center">Copyright</p>
          </strong>
      </div>
  </footer>
  <script>
      $(function() {
          $('a#logout').click(function() {
              if (confirm('Yakin keluar akun ?')) {
                  return true;
              }

              return false;
          });
      });
      $(function() {
          $('a#hapus').click(function() {
              if (confirm('Yakin hapus ?')) {
                  return true;
              }

              return false;
          });
      });

      $(function() {
          $('a#konfirmasi').click(function() {
              if (confirm('Yakin konfirmasil pembayaran user ?')) {
                  return true;
              }

              return false;
          });
      });
  </script>

  </body>

  </html>