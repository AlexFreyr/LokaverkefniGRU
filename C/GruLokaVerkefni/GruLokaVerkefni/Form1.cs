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
            listBox1.Items.Clear();
            List<string> linur = new List<string>();
            try
            {
                linur = gagnagrunnur.LesautSQLToflu();

                foreach (string lin in linur)
                {
                    listBox1.Items.Add(lin);
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
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

        }

        private void btEydaEinstakling_Click(object sender, EventArgs e)
        {
            listBox1.Items.Clear();
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
            string ReiknisNumer = tbReiknings.Text;
            string[] gognFraSQL = new string[2];
            try
            {
                gognFraSQL = gagnagrunnur.FinnaReikning(ReiknisNumer);
                tbInneign.Text = gognFraSQL[0];
                tbSkuldir.Text = gognFraSQL[1];
        


            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            listBox1.Items.Clear();
            List<string> linur = new List<string>();
            try
            {
                

                foreach (string lin in linur)
                {
                    listBox1.Items.Add(lin);
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
        }
    }
}
