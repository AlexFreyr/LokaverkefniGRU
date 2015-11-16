using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
namespace GruLokaVerkefni
{
    class Gagnagrunnur
    {
        private string server;

        private string database;

        private string uid;

        private string password;

        string tengistrengur = null;

        string fyrirspurn = null;

        MySqlConnection sqltenging;
        MySqlCommand nySQLskipun;
        MySqlDataReader sqllesari = null;


        public void TengingVidGagnagrunn()
        {
            server = "tsuts.tskoli.is";
            database = "2408982179_grulokaverk";
            uid = "2408982179";
            password = "mypassword";

            tengistrengur = "server= " + server + ";userid= " + uid + ";password= " + password + ";database= " + database;

            sqltenging = new MySqlConnection(tengistrengur);
        }


        private bool OpenConnection()
        {
            try
            {
                sqltenging.Open();
                return true;
            }
            catch (MySqlException ex)
            {
                throw ex;
            }
        }

        public void SettInnSqlToflu(string kt, string nafn, string netfang, string Kyn, string Land, string lykilord)
        {
            if (OpenConnection() == true)
            {

                fyrirspurn = "INSERT INTO notandi (Kennitala, nafn, netfang, kyn,land,lykilord) VALUES ('" + kt + "','" + nafn + "','" + netfang + "','" + Kyn + "','" + Land + "','" + lykilord + "')";

                nySQLskipun = new MySqlCommand(fyrirspurn, sqltenging);

                nySQLskipun.ExecuteNonQuery();
                CloseConnection();
            }
        }

        public string FinnaEinstakling(string id)
        {
            string lina = null;
            if (OpenConnection() == true)
            {
                fyrirspurn = "SELECT id_medlimur,Nafn,netfang,simanumer FROM medlimur where id_medlimur ='" + id + "'";
                nySQLskipun = new MySqlCommand(fyrirspurn, sqltenging);
                sqllesari = nySQLskipun.ExecuteReader();
                while (sqllesari.Read())
                {
                    for (int i = 0; i < sqllesari.FieldCount; i++)
                    {
                        lina += (sqllesari.GetValue(i).ToString()) + ":";
                    }
                }
                sqltenging.Close();
            }
            return lina;
        }

        public void Eyda(string kt)
        {
            if (OpenConnection() == true)
            {
                fyrirspurn = "Delete FROM notandi where kennitala='" + kt + "'";
                nySQLskipun = new MySqlCommand(fyrirspurn, sqltenging);
                nySQLskipun.ExecuteNonQuery();
                CloseConnection();
            }
        }

        public void Uppfaera(string kt, string nafn, string net, string Kyn, string land, string lykilord)
        {
            if (OpenConnection() == true)
            {
                fyrirspurn = "Update Notandi set Kennitala ='" + kt + "', Nafn='" + nafn + "',netfang='" + net + "',Kyn='" + Kyn + "',land='" + land + "',Lykilord='" + lykilord + "' where Kennitala='" + kt + "'";
                nySQLskipun = new MySqlCommand(fyrirspurn, sqltenging);
                nySQLskipun.ExecuteNonQuery();
                CloseConnection();
            }
        }

        public List<string> LesautSQLToflu()
        {
            List<string> Faerslur = new List<string>();
            string lina = null;
            if (OpenConnection() == true)
            {
                fyrirspurn = "SELECT Kennitala,Nafn,netfang,Kyn,Land,Lykilord FROM notandi";
                nySQLskipun = new MySqlCommand(fyrirspurn, sqltenging);

                sqllesari = nySQLskipun.ExecuteReader();
                while (sqllesari.Read())
                {
                    for (int i = 0; i < sqllesari.FieldCount; i++)
                    {
                        lina += (sqllesari.GetValue(i).ToString()) + ":";
                    }
                    Faerslur.Add(lina);
                    lina = null;
                }
                CloseConnection();
                return Faerslur;
            }
            return Faerslur;
        }

        public string[] FinnaAkvedinOgSkilaTilBaka(string kt)
        {
            string[] gogn = new string[6];
            if (OpenConnection() == true)
            {
                fyrirspurn = "SELECT Kennitala,nafn,netfang,Kyn,Land,lykilord FROM Notandi where Kennitala='" + kt + "'";
                nySQLskipun = new MySqlCommand(fyrirspurn, sqltenging);
                sqllesari = nySQLskipun.ExecuteReader();
                while (sqllesari.Read())
                {
                    gogn[0] = sqllesari.GetValue(0).ToString();
                    gogn[1] = sqllesari.GetValue(1).ToString();
                    gogn[2] = sqllesari.GetValue(2).ToString();
                    gogn[3] = sqllesari.GetValue(3).ToString();
                    gogn[4] = sqllesari.GetValue(4).ToString();
                    gogn[5] = sqllesari.GetValue(5).ToString();
                }
                sqllesari.Close();
                CloseConnection();
                return gogn;

            }
            return gogn;
        }
        public string[] FinnaReikning(string rn)
        {
            string[] gogn = new string[2];
            if (OpenConnection() == true)
            {
                fyrirspurn = "SELECT  Innistaeda,skuldir FROM Innistaeda where ID_reikningur='" + rn + "'";
                nySQLskipun = new MySqlCommand(fyrirspurn, sqltenging);
                sqllesari = nySQLskipun.ExecuteReader();
                while (sqllesari.Read())
                {
                    gogn[0] = sqllesari.GetValue(0).ToString();
                    gogn[1] = sqllesari.GetValue(1).ToString();
                  
                }
                sqllesari.Close();
                CloseConnection();
                return gogn;

            }
            return gogn;
        }
        //Þessi aðferp lokar tengingu
        private bool CloseConnection()
        {
            try
            {
                sqltenging.Close();
                return true;
            }
            catch (MySqlException ex)
            {

                throw ex;
            }
        }
    }
   
    
}
