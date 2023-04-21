# import statements
import sys
import time
import os

sarg = sys.argv[1].split("()()()")
data = sarg[0]
modelname = sarg[1]
rows = data.split(")++(")
lists = [r.split(")__(") for r in rows]
df = pd.DataFrame(lists, columns = ["prompt", "completion"])

import pandas as pd
try: 
    # os.system("pip install openai")
    
    # Make the library available to all users
    # os.system("sudo -H pip3 install <library_name> --prefix=/usr/local")
    import openai
    # from openai import api_key
    # from openai import File
    # from openai import FineTune
except Exception as err:
    print(f"Unable to Import openai :( .\nUnexpected {err}, {type(err)}")

class Openai_FineTuning:
    #*constructor
    #define important parameters
    def __init__(self, key, modelname):
        try: 
            self.OPENAI_API_KEY = key
            # self.DATALOC = dataloc
            self.MODELNAME = modelname
        except Exception as err:
            print(f"Unable to Initialize Params :( .\nUnexpected {err}, {type(err)}")
            raise
        else:
            print("||| Initialized Params. |||")

    #*format data
    def preprocess(self, df):
        try: 
            df.dropna(inplace=True)
            df["prompt"] = [x+" ->" for x in df["prompt"]]
            df["completion"] = [' '+x+"\n" for x in df["completion"]]
            dfloc = "df.csv" #set path for processed csv file
            df.to_csv(dfloc, index=False)
        except Exception as err:
            print(f"Unable to Preprocess Data :( .\nUnexpected {err}, {type(err)}")
            raise
        else:
            return dfloc # return location of processed csv file
        
    #*create finetune and return finetuneid
    def finetuner(self, dfloc):
        try:
            #1.Preprocessing Data (csv->jsonl)
            # openai.api_key = self.OPENAI_API_KEY
            openai.api_key = self.OPENAI_API_KEY
            #!echo "Y" | openai tools fine_tunes.prepare_data -f dfloc
            os.system(f'echo "Y" | openai tools fine_tunes.prepare_data -f {dfloc}')
            time.sleep(10)
        except Exception as err:
            print(f"Unable to Jsonlify :( .\nUnexpected {err}, {type(err)}")
            raise
        else:
            print("||| Openai Jsonlified. |||")
        
        #2.upload jsonl file
        # jsonp = '/kaggle/working/'+'df'+'_prepared.jsonl'
        try:
            jsonp = '/kaggle/working/'+dfloc[:-4]+'_prepared.jsonl'
            uploadingjson = openai.File.create(
                file=open(jsonp, "rb"),
                purpose='fine-tune'
            )
        except Exception as err: 
            print(f"Unable to Upload Jsonl :( .\nUnexpected {err}, {type(err)}")
            raise
        else:
            print("||| Uploaded Jsonl. |||")
        
        #3.create fine tune
        try:
            jsonid = uploadingjson['id']
            finetuning = openai.FineTune.create(
                training_file=jsonid, 
                model="davinci",
                suffix=self.MODELNAME
            ) # pass id of jsonl file containing data
        except Exception as err:
            print(f"Unable to Fine Tune :( .\nUnexpected {err}, {type(err)}")
            raise
        else:
            print("||| Created Finetune. |||")
        
        #4.Waiting
        # takes around 10 mins for ~200 rows
        ftid = finetuning['id']
        # get status of fine tune job, retry if not success
        # Get the status of our fine-tune job.
        status = openai.FineTune.retrieve(id=ftid)["status"]
        # If the job isn't yet done, poll it every 2 seconds.
        t = 0
        if status not in ["succeeded", "failed"]:
            print(f'Job not in terminal status: {status}. Waiting.')
            while status not in ["succeeded", "failed"]:
                time.sleep(60)
                t += 1
                status = openai.FineTune.retrieve(id=ftid)["status"]
                print(f'Status: {status} (Time: {t} min(s))')
                
                # dont wait for more than 20 mins
                # end operation, and cancel finetune
                if t > 20:
                    print('Taking Too Long :/')
                    
        else:
            print(f'Fine-tune job {ftid} finished with status: {status} in {t} mins.')
        
        # get fine tunes list
        finetunelist = openai.FineTune.list()
        #getting modelid
        mid = ''
        for i in range(len(finetunelist['data'])):
            if finetunelist['data'][i]['id'] == ftid:
                mid = finetunelist['data'][i]['fine_tuned_model']
        return (ftid,mid)

    def ft(self, df):
        #1.Setting up Openai
        #secret_label = "OPAI_KEY"
        #OPENAI_API_KEY = UserSecretsClient().get_secret(secret_label)
        openai.api_key = self.OPENAI_API_KEY
        os.environ['OPENAI_API_KEY'] = self.OPENAI_API_KEY
        
        #1.read csv file
        # df = pd.read_csv(self.DATALOC, encoding="UTF-8")
        
        #2.preprocessing df, returns location of 
        dfloc = self.preprocess(df)
        print("||| Preprocessed Data. |||")
        
        #3.run openai pipeline and get finetune id
        (ftid,mid) = self.finetuner(dfloc)
        print("||| Fine Tuning Completed. Model Ready. |||")
        
        print(f'\nFinetune-Id: ->{ftid}<-.\nModel-Id: ->{mid}<-')
        return (ftid,mid)

# creating object, initializing parameters
key = "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"
modelname = 'firsttrialrun'
# run fine tuner to get finetune id and model id if successful
(finetuneid,modelid) = Openai_FineTuning(
    key = key, 
    modelname = modelname
).ft()

# print(f"finetuneid: {finetuneid}\nmodelid: {modelid}\nModel Name: {modelname}\n||| Model Trained Successfully!! |||")
print(modelid)

# print(f"data: {data}<br/><br/>Modelname: {modelname}")