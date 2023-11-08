                    </div>
                </div>
            </div> 
        </div>
    </section>
    <footer>
        <div class="container-fluid footer_full"></div>

        </div>
    </footer>
    <script src="js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/sweetalert.all.min.js"></script>

    <?php 
    if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
        ?>
    <script>
        Swal.fire({
    title: "<?php echo $_SESSION['status']; ?>",
    icon: "<?php echo $_SESSION['status_code']; ?>"
    });
    </script>

<?php
    }else{
        ?>

    <script>
    Swal.fire({
    title: "<?php echo $_SESSION['status']; ?>",
    icon: "<?php echo $_SESSION['status_code']; ?>"
    });
    </script>

    <?php
    }
    ?>
    
</body>
</html>