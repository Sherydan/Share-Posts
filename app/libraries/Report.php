<?php
    use Spipu\Html2Pdf\Html2Pdf;
    require_once('../app/vendor/autoload.php');

    class Report{
        

        public function __construct(){
           
        }

        public function listAllUsers($data = []){
            /*
            ob_start();
            require_once('../app/views/reports/user_report.php');
            $html = ob_get_clean();
            $html2pdf = new Html2Pdf('p', 'A4', 'es', 'true', 'UTF-8');
            $html2pdf->writeHTML($html);
            ob_end_clean();
            */
            foreach ($data as $user) {
                $trow .= "<tr>";
                $trow .= "<td>$user->id</td>";
                $trow .= "<td>$user->name</td>";
                $trow .= "<td>$user->email</td>";
                $trow .= "<td>$user->created_at</td>";
                $trow .= "</tr>";
            }
            $html = "<page backtop=\"7mm\" backbottom=\"7mm\" backleft=\"10mm\" backright=\"10mm\"> 
                        <page_header> 
                            Page Header 
                        </page_header> 
                        <page_footer> 
                            Page Footer 
                        </page_footer> 
                    
                        <h1>Users</h1>
                    
                        <table>
                            <thead>
                                <tr>
                                    <th>User id</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Registered</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                $trow
                            </tbody>
                        </table>
                    </page>";
            $html2pdf = new Html2Pdf('p', 'A4', 'es', 'true', 'UTF-8');
            $html2pdf->writeHTML($html);
            ob_end_clean();
            $html2pdf->output('pdf_generated.pdf');
        }

        public function listUsersByName($data){
            foreach ($data as $user) {
                $trow .= "<tr>";
                $trow .= "<td>$user->id</td>";
                $trow .= "<td>$user->name</td>";
                $trow .= "<td>$user->email</td>";
                $trow .= "<td>$user->created_at</td>";
                $trow .= "</tr>";
            }
            $html = "<page backtop=\"7mm\" backbottom=\"7mm\" backleft=\"10mm\" backright=\"10mm\"> 
                        <page_header> 
                            Page Header 
                        </page_header> 
                        <page_footer> 
                            Page Footer 
                        </page_footer> 
                    
                        <h1>Users</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>User id</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Registered</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                $trow
                            </tbody>
                        </table>
                    </page>";
            $html2pdf = new Html2Pdf('p', 'A4', 'es', 'true', 'UTF-8');
            $html2pdf->writeHTML($html);
            ob_end_clean();
            $html2pdf->output('pdf_generated.pdf');
        }
    }

?>