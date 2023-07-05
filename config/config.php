<?php

    class Config 
    {
        private $HOST = "localhost";
        private $USERNAME = "root";
        private $PASSWORD = "";
        private $DB_NAME = "railway_management_system";
        private $ADMIN_TABLE = "tbl_admin";
        private $CUSTOMER_TABLE = "tbl_customer";
        private $TRAIN_TICKET_TABLE = "tbl_train_ticket";
        private $TRANSACTION_TYPE_TABLE = "tbl_transaction_type";
        private $TRANSACTION_TABLE = "tbl_transaction";
        private $RESERVATION_TABLE = "tbl_reservation";
        

        public $CONN;

        public function connect()
        {
            $this->CONN = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD,$this->DB_NAME);

            return $this->CONN;
        }

        public function insert_admin($Name, $Gender, $Age, $Phone_no, $Email) 
        {
            $this->connect();

            $Query = "INSERT INTO $this->ADMIN_TABLE(Name, Gender, Age, Phone_no, Email) VALUES('$Name', '$Gender', $Age, $Phone_no, '$Email');";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }
        
        public function fetch_all_admins() 
        {
            $this->connect();

            $Query = "SELECT * FROM $this->ADMIN_TABLE;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function fetch_single_admin($id)
        {
            $this->connect();

            $Query = "SELECT * FROM $this->ADMIN_TABLE WHERE Admin_id=$id;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function update_admin($Name, $Gender, $Age, $Phone_no, $Email, $Id)
        {
            $this->connect();

            $fetched_student_res = $this->fetch_single_admin($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_student_res);

            if($fetched_record)
            {
                $Query = "UPDATE $this->ADMIN_TABLE SET Name='$Name', Gender='$Gender', Age=$Age, Phone_no=$Phone_no, Email='$Email' WHERE Admin_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);
    
                return $res;
            }
            else
            {
                return false;
            }

           
        }

        public function delete_admin($Id)
        {
            $this->connect();

            $fetched_student_res = $this->fetch_single_admin($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_student_res);

            if($fetched_record)
            {
                $Query = "DELETE FROM $this->ADMIN_TABLE WHERE Admin_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);

                return $res;
            }
            else
            {
                return false;
            }

            
        }

        public function insert_customer($Name, $Gender, $Age, $Phone_no, $Email) 
        {
            $this->connect();

            $Query = "INSERT INTO $this->CUSTOMER_TABLE(Name, Gender, Age, Phone_no, Email) VALUES('$Name', '$Gender', $Age, $Phone_no, '$Email');";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }
        
        public function fetch_all_customers() 
        {
            $this->connect();

            $Query = "SELECT * FROM $this->CUSTOMER_TABLE;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function fetch_single_customer($id)
        {
            $this->connect();

            $Query = "SELECT * FROM $this->CUSTOMER_TABLE WHERE Customer_id=$id;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function update_customer($Name, $Gender, $Age, $Phone_no, $Email, $Id)
        {
            $this->connect();

            $fetched_student_res = $this->fetch_single_customer($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_student_res);

            if($fetched_record)
            {
                $Query = "UPDATE $this->CUSTOMER_TABLE SET Name='$Name', Gender='$Gender', Age=$Age, Phone_no=$Phone_no, Email='$Email' WHERE Customer_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);
    
                return $res;
            }
            else
            {
                return false;
            }

           
        }

        public function delete_customer($Id)
        {
            $this->connect();

            $fetched_student_res = $this->fetch_single_customer($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_student_res);

            if($fetched_record)
            {
                $Query = "DELETE FROM $this->CUSTOMER_TABLE WHERE Customer_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);

                return $res;
            }
            else
            {
                return false;
            } 
        }

        public function insert_train_ticket($Date_start, $Date_end, $Destination, $Time_pick, $Time_land) 
        {
            $this->connect();

            $Query = "INSERT INTO $this->TRAIN_TICKET_TABLE(Date_start, Date_end, Destination, Time_pick, Time_land) VALUES('$Date_start', '$Date_end', '$Destination', '$Time_pick', '$Time_land');";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }
        
        public function fetch_all_train_tickets() 
        {
            $this->connect();

            $Query = "SELECT * FROM $this->TRAIN_TICKET_TABLE;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function fetch_single_train_ticket($id)
        {
            $this->connect();

            $Query = "SELECT * FROM $this->TRAIN_TICKET_TABLE WHERE Ticket_id=$id;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function update_train_ticket($Date_start, $Date_end, $Destination, $Time_pick, $Time_land, $Id)
        {
            $this->connect();

            $fetched_student_res = $this->fetch_single_train_ticket($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_student_res);

            if($fetched_record)
            {
                $Query = "UPDATE $this->TRAIN_TICKET_TABLE SET Date_start='$Date_start', Date_end='$Date_end', Destination='$Destination', Time_pick='$Time_pick', Time_land='$Time_land' WHERE Ticket_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);
    
                return $res;
            }
            else
            {
                return false;
            }           
        }

        public function delete_train_ticket($Id)
        {
            $this->connect();

            $fetched_student_res = $this->fetch_single_train_ticket($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_student_res);

            if($fetched_record)
            {
                $Query = "DELETE FROM $this->TRAIN_TICKET_TABLE WHERE Ticket_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);

                return $res;
            }
            else
            {
                return false;
            } 
        }

        public function insert_transaction_type($Trans_name) 
        {
            $this->connect();

            $Query = "INSERT INTO $this->TRANSACTION_TYPE_TABLE(Trans_name) VALUES('$Trans_name');";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }
        
        public function fetch_all_transaction_types() 
        {
            $this->connect();

            $Query = "SELECT * FROM $this->TRANSACTION_TYPE_TABLE;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function fetch_single_transaction_type($id)
        {
            $this->connect();

            $Query = "SELECT * FROM $this->TRANSACTION_TYPE_TABLE WHERE TransTy_id=$id;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function update_transaction_type($Trans_name, $Id)
        {
            $this->connect();

            $fetched_res = $this->fetch_single_transaction_type($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_res);

            if($fetched_record)
            {
                $Query = "UPDATE $this->TRANSACTION_TYPE_TABLE SET Trans_name='$Trans_name' WHERE TransTy_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);
    
                return $res;
            }
            else
            {
                return false;
            }           
        }

        public function delete_transaction_type($Id)
        {
            $this->connect();

            $fetched_res = $this->fetch_single_transaction_type($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_res);

            if($fetched_record)
            {
                $Query = "DELETE FROM $this->TRANSACTION_TYPE_TABLE WHERE TransTy_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);

                return $res;
            }
            else
            {
                return false;
            } 
        }

        public function insert_Reservation($Customer_id, $Admin_id, $Ticket_id, $Date_Reserve) 
        {
            $this->connect();

            $Query = "INSERT INTO $this->RESERVATION_TABLE(Customer_id, Admin_id, Ticket_id, Date_Reserve) VALUES($Customer_id, $Admin_id, $Ticket_id, '$Date_Reserve');";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }
        
        public function fetch_all_Reservation() 
        {
            $this->connect();

            $Query = "SELECT * FROM $this->RESERVATION_TABLE;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function fetch_single_Reservation($id)
        {
            $this->connect();

            $Query = "SELECT * FROM $this->RESERVATION_TABLE WHERE Reservation_id=$id;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function update_Reservation($Customer_id, $Admin_id, $Ticket_id, $Date_Reserve, $Id)
        {
            $this->connect();

            $fetched_res = $this->fetch_single_Reservation($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_res);

            if($fetched_record)
            {
                $Query = "UPDATE $this->RESERVATION_TABLE SET Customer_id=$Customer_id, Admin_id=$Admin_id, Ticket_id=$Ticket_id, Date_Reserve='$Date_Reserve' WHERE Reservation_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);
    
                return $res;
            }
            else
            {
                return false;
            }           
        }

        public function delete_Reservation($Id)
        {
            $this->connect();

            $fetched_res = $this->fetch_single_Reservation($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_res);

            if($fetched_record)
            {
                $Query = "DELETE FROM $this->RESERVATION_TABLE WHERE Reservation_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);

                return $res;
            }
            else
            {
                return false;
            } 
        }
    
        public function insert_transaction($TransTy_id, $Reservation_id, $Admin_id, $Customer_id, $Transaction_date) 
        {
            $this->connect();

            $Query = "INSERT INTO $this->TRANSACTION_TABLE(TransTy_id, Reservation_id, Admin_id, Customer_id, Transaction_date) VALUES($TransTy_id, $Reservation_id, $Admin_id, $Customer_id, '$Transaction_date');";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }
        
        public function fetch_all_transactions() 
        {
            $this->connect();

            $Query = "SELECT * FROM $this->TRANSACTION_TABLE;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function fetch_single_transaction($id)
        {
            $this->connect();

            $Query = "SELECT * FROM $this->TRANSACTION_TABLE WHERE Transaction_id=$id;";

            $res = mysqli_query($this->CONN, $Query);

            return $res;
        }

        public function update_transaction($TransTy_id, $Reservation_id, $Admin_id, $Customer_id, $Transaction_date, $Id)
        {
            $this->connect();

            $fetched_res = $this->fetch_single_transaction($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_res);

            if($fetched_record)
            {
                $Query = "UPDATE $this->TRANSACTION_TABLE SET TransTy_id=$TransTy_id, Reservation_id=$Reservation_id, Admin_id=$Admin_id, Customer_id=$Customer_id, Transaction_date='$Transaction_date' WHERE Transaction_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);
    
                return $res;
            }
            else
            {
                return false;
            }           
        }

        public function delete_transaction($Id)
        {
            $this->connect();

            $fetched_res = $this->fetch_single_transaction($Id);

            $fetched_record = mysqli_fetch_assoc($fetched_res);

            if($fetched_record)
            {
                $Query = "DELETE FROM $this->TRANSACTION_TABLE WHERE Transaction_id=$Id;";

                $res = mysqli_query($this->CONN, $Query);

                return $res;
            }
            else
            {
                return false;
            } 
        }
    }

?>