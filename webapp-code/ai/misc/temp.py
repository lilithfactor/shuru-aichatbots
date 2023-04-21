import pandas as pd
import openai
from openai import cli
import time
import shutil
import json
import os

#* formats prompts and completions
# add "\n\n###\n\n" at end of prompts
# start completions iwth space and end with "###"
def formatdf(df):
    df['prompt'] = [x+"\n\n###\n\n" for x in df['prompt']]
    df['completion'] = [' '+x+"###" for x in df["completion"]]
    return df

# df = pd.read_csv("./inputcsv/data.csv", encoding="UTF-8")
# df.columns = ['prompt','completion']
# df = formatdf(df)
# df.to_csv("./outputcsv/data1.csv", index=False)

# dfpath = "./outputcsv/data1.csv"
# with open(dfpath, 'r', encoding="UTF-8") as f:
#     df = f.read()

def openai_():
    #* convert csv into jsonl
    # preprocessing = 'openai tools fine_tunes.prepare_data -f ./outputcsv/data1.csv" --yes'
    # os.system(preprocessing)

    # openai.api_key = "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"
    os.system('openai.api_key = "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"')
    #! create fine tuned model
    model = 'openai api fine_tunes.create -t "./outputcsv/data1_prepared.jsonl" -m "text-davinci-003"'
    os.system(model)

    #! customize model name
    # custommodel = 'openai api fine_tunes.create -t test.jsonl -m ada --suffix "custom model name"'
    # os.system(preprocessing)

    #! resume fine tune job if reqd
    # resumejob = 'openai api fine_tunes.follow -i <YOUR_FINE_TUNE_JOB_ID>'
    # os.system(preprocessing)

    #! Retrieve the status of a fine-tune
    # finetunestatus = 'openai api fine_tunes.get -i <YOUR_FINE_TUNE_JOB_ID>'
    # os.system(preprocessing)

    #! making a prediction
    #! openai api completions.create -m <FINE_TUNED_MODEL> -p <YOUR_PROMPT>
    # openai.api_key = os.getenv("OPENAI_API_KEY")
    # openai.Completion.create(
    #     model="text-davinci-003",
    #     prompt="\n\n###\n\n",
    #     max_tokens=7,
    #     temperature=0
    # )

openai_()
print("reached")

# def guide():
#     # https://YOUR_RESOURCE_NAME.openai.azure.com/
#     openai.api_base =  "COPY_YOUR_OPENAI_ENDPOINT_HERE" 
#     openai.api_type = 'azure'
#     # The API version may change in the future.
#     openai.api_version = '2022-06-01-preview'

#     training_file_name = 'training.jsonl'
#     validation_file_name = 'validation.jsonl'

#     sample_data = [{"prompt": "When I go to the store, I want an", "completion": "apple"},
#         {"prompt": "When I go to work, I want a", "completion": "coffee"},
#         {"prompt": "When I go home, I want a", "completion": "soda"}]

#     # Generate the training dataset file.
#     print(f'Generating the training file: {training_file_name}')
#     with open(training_file_name, 'w') as training_file:
#         for entry in sample_data:
#             json.dump(entry, training_file)
#             training_file.write('\n')

#     # Copy the validation dataset file from the training dataset file.
#     # Typically, your training data and validation data should be mutually exclusive.
#     # For the purposes of this example, we're using the same data.
#     print(f'Copying the training file to the validation file')
#     shutil.copy(training_file_name, validation_file_name)

#     def check_status(training_id, validation_id):
#         train_status = openai.File.retrieve(training_id)["status"]
#         valid_status = openai.File.retrieve(validation_id)["status"]
#         print(f'Status (training_file | validation_file): {train_status} | {valid_status}')
#         return (train_status, valid_status)

#     # Upload the training and validation dataset files to Azure OpenAI.
#     training_id = cli.FineTune._get_or_upload(training_file_name, True)
#     validation_id = cli.FineTune._get_or_upload(validation_file_name, True)

#     # Check on the upload status of the training and validation dataset files.
#     (train_status, valid_status) = check_status(training_id, validation_id)

#     # Poll and display the upload status once a second until both files have either
#     # succeeded or failed to upload.
#     while train_status not in ["succeeded", "failed"] or valid_status not in ["succeeded", "failed"]:
#         time.sleep(1)
#         (train_status, valid_status) = check_status(training_id, validation_id)

