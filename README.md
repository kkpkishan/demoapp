# Demo PHP App with aws secrets  
<table width="100%">
    <tr>
        <th align="left" colspan="2"><h4><a href="https://github.com/kkpkishan/demoapp.git"> Demo PHP App</a></h4></th>
    </tr>
    <tr>
        <td width="100%" valign="top">
           <p>Create a Docker images.</p>
           <h6>Create Details</h6>
           <ol>
            <li>Install Dokcer in your local system</li>
            <li>Clone the repository</li>
            <li>Create a RDS on AWS Account</li>
               <p> -> Create Database and table using db-table-sql.txt  </p>
            <li>Create a AWS secrests</li>
            <p> {
                                            "host": "RDS Endpoint",
                                            "username": "admin",
                                            "password": "password",
                                            "dbname": "inventorymanagement"
                                           }
            </p> 
            <li>Edite config.php and add your aws secret name and region</li>
            <li>Build Docker images</li>
            <li>Create AWS ECR and push your docker images</li>
            <li>Create AWS Farget Cluster</li>
            <li>Create ECS role and provide access AWS Secret</li>
            <li>Create a Task Defination</li>
            <li>Run Task Defination</li>
            <li>URL: http://task-publicip:8092</li>
        </td>
    </tr> 
 </table>


