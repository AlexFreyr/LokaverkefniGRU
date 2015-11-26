using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace GruLokaVerkefni
{
    public partial class Form1 : Form
    {
        Gagnagrunnur gagnagrunnur = new Gagnagrunnur();
        public Form1()
        {
            InitializeComponent();
            try
            {
                gagnagrunnur.TengingVidGagnagrunn();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
        }

        private void btFinnaNafn_Click(object sender, EventArgs e)
        {

        }

        private void btLeita_Click(object sender, EventArgs e)
        {
            string kennitala = tbBreytaKennitolu.Text;
            string[] gognFraSQL = new string[6];
            try
            {
                gognFraSQL = gagnagrunnur.FinnaAkvedinOgSkilaTilBaka(kennitala);
                tbBreytaKennitolu.Text = gognFraSQL[0];
                tbBreytaNafn.Text = gognFraSQL[1];
                tbBreytaNetafng.Text = gognFraSQL[2];
                tbBreytaKyn.Text = gognFraSQL[3];
                tbBreytaLand.Text = gognFraSQL[4];
                

            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
        }

        private void btSkraIMedlimatoflu_Click(object sender, EventArgs e)
        {
            string kennitala = tbSkraningKennitala.Text;
            string nafn = tbSkraningNafn.Text;
            string netfang = tbSkraningNetfang.Text;
            string kyn = tbKyn.Text;
            string land = tbLand.Text;
            string lykilord = tbLykilord.Text;

            if (Kennitolutekk(kennitala) == false)
                MessageBox.Show("Kennitalan er röng. Reyndu aftur.");
            else if (kyn == string.Empty || netfang == string.Empty || nafn == string.Empty || land == string.Empty || lykilord == string.Empty)
                MessageBox.Show("Vantar að fylla út í textbox");
            else
            {
                try
                {
                    gagnagrunnur.SettInnSqlToflu(kennitala, nafn, netfang, kyn, land, lykilord);
                }
                catch (Exception ex)
                {
                    MessageBox.Show(ex.ToString());
                }
            }
        }
        public bool Kennitolutekk(string kennitala)
        {
            kennitala = kennitala.Trim();
            int i = kennitala.IndexOf('-');
            while (i > 0)
            {
                kennitala = kennitala.Remove(i, 1);
                i = kennitala.IndexOf('-');
            }
            if (kennitala.Length == 10)
            {
                int iSum = (int.Parse(kennitala[0].ToString()) * 3) +
                            (int.Parse(kennitala[1].ToString()) * 2) +
                            (int.Parse(kennitala[2].ToString()) * 7) +
                            (int.Parse(kennitala[3].ToString()) * 6) +
                            (int.Parse(kennitala[4].ToString()) * 5) +
                            (int.Parse(kennitala[5].ToString()) * 4) +
                            (int.Parse(kennitala[6].ToString()) * 3) +
                            (int.Parse(kennitala[7].ToString()) * 2);
                int iSum_t = 0;
                if (iSum % 11 > 0)
                {
                    iSum_t = (iSum / 11) + 1;
                }
                else
                {
                    iSum_t = iSum / 11;
                }

                if ((iSum_t * 11) - iSum == int.Parse(kennitala[8].ToString()))
                {
                    return true;
                }

            }
            return false;
        }

        private void listBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            
        }

        private void btSkodaToflu_Click(object sender, EventArgs e)
        {
            
        }

        private void tbBreytaOgUppfaera_Click(object sender, EventArgs e)
        {
            string kennitala = tbBreytaKennitolu.Text,
                   nafn = tbBreytaNafn.Text,
                   netfang = tbBreytaNetafng.Text,
                   kyn = tbBreytaKyn.Text,
                   land = tbBreytaLand.Text,
                   lykilord = tbBreytaLykilord.Text;

            try
            {
                gagnagrunnur.Uppfaera(kennitala, nafn, netfang, kyn, land, lykilord);
                MessageBox.Show("Upplýsingar voru breyttar");
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
        }

        private void Form1_Load(object sender, EventArgs e)
           {        
            //Notandi
            
            List<string> linur = new List<string>();
            string[] dataNotandi;
            string lineNotandi = null;
            int talaNotandi = 0;
            try
            {

                linur = gagnagrunnur.LesautSQLToflu();
                while ((lineNotandi = linur[talaNotandi]) != null)
                {
                    dgNotandi.Rows.Add();
                    dataNotandi = lineNotandi.Split(':');
                    dgNotandi.Rows[talaNotandi].Cells[0].Value = dataNotandi[0];
                    dgNotandi.Rows[talaNotandi].Cells[1].Value = dataNotandi[1];
                    dgNotandi.Rows[talaNotandi].Cells[2].Value = dataNotandi[2];
                    dgNotandi.Rows[talaNotandi].Cells[3].Value = dataNotandi[3];
                    this.dgNotandi.ColumnHeadersHeight = 20;
                    talaNotandi++;
                }

            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
            //Inneingn Datagrid
            List<string> linurInneign = new List<string>();
            string[] data;
            string line = null;
            int tala = 0;
            try
            {

                linurInneign = gagnagrunnur.LesautInneignSQLToflu();
                while ((line = linurInneign[tala]) != null)
                {

                    dgReikningar.Rows.Add();
                    data = line.Split(':');
                    dgReikningar.Rows[tala].Cells[0].Value = data[0];
                    dgReikningar.Rows[tala].Cells[1].Value = data[1];
                    dgReikningar.Rows[tala].Cells[2].Value = data[2];
                    dgReikningar.Rows[tala].Cells[3].Value = data[3];
                    this.dgReikningar.ColumnHeadersHeight = 20;
                    tala++;
                    
                    
                       
                    
                }
              
            }
            catch (Exception ex)
            {

                MessageBox.Show("Error " + ex);
            }
            // Skudlir Datagrid
            /*
            List<string> linurSkuldir = new List<string>();
            string[] dataSkuldir;
            string lineSkuldir = null;
            int talaSkuldir = 0;
            try
            {

                linurSkuldir = gagnagrunnur.LesaUtSkuldirSQLToflu();
                while ((lineSkuldir = linurSkuldir[talaSkuldir]) != null)
                {
                    dgSkuldir.Rows.Add();
                    dataSkuldir = lineSkuldir.Split(':');
                    dgSkuldir.Rows[talaSkuldir].Cells[0].Value = dataSkuldir[0];
                    dgSkuldir.Rows[talaSkuldir].Cells[1].Value = dataSkuldir[1];
                    dgSkuldir.Rows[talaSkuldir].Cells[2].Value = dataSkuldir[2];
                    dgSkuldir.Rows[talaSkuldir].Cells[3].Value = dataSkuldir[3];
                    this.dgSkuldir.ColumnHeadersHeight = 20;
                    talaSkuldir++;
                }

            }
            catch (Exception ex)
            {

                MessageBox.Show("Error " + ex);
            }*/


        }

        private void btEydaEinstakling_Click(object sender, EventArgs e)
        {
            
            string id_medlimur = tbBreytaKennitolu.Text;
            try
            {
                gagnagrunnur.Eyda(id_medlimur);
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
        }

        private void textBox3_TextChanged(object sender, EventArgs e)
        {

        }

        private void btLeitaReiknings_Click(object sender, EventArgs e)
        {
            string Nafn = tbNafnReikning.Text;
            string[] gognFraSQL = new string[3];
            try
            {
                gognFraSQL = gagnagrunnur.FinnaReikning(Nafn);
                tbReiknings.Text = gognFraSQL[0];
                tbInneign.Text = gognFraSQL[1];
                tbVextir.Text = gognFraSQL[2];
                
                
        


            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
        }

       

        private void dgReikningar_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void btFinnaReikningKT_Click(object sender, EventArgs e)
        {

        }
    }
}
