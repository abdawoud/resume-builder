<?php

    try{
        require_once('../lib/MongoDBConnection.php');
        $con = MongoDBConnection::getMongoCon(false);
        $database = $con->selectDB('m');
        $resumes = $database->selectCollection('resumes');
        $resume = $resumes->findOne(array('_id' => new MongoId($_SESSION['Resume_id'])));
    }catch(Exception $e){
        echo $e;
    }

?>
<w:document xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main" xmlns:m="http://schemas.openxmlformats.org/officeDocument/2006/math" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w10="urn:schemas-microsoft-com:office:word" xmlns:w14="http://schemas.microsoft.com/office/word/2010/wordml" xmlns:wne="http://schemas.microsoft.com/office/word/2006/wordml" xmlns:wp="http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing" xmlns:wp14="http://schemas.microsoft.com/office/word/2010/wordprocessingDrawing" xmlns:wpc="http://schemas.microsoft.com/office/word/2010/wordprocessingCanvas" xmlns:wpg="http://schemas.microsoft.com/office/word/2010/wordprocessingGroup" xmlns:wpi="http://schemas.microsoft.com/office/word/2010/wordprocessingInk" xmlns:wps="http://schemas.microsoft.com/office/word/2010/wordprocessingShape" mc:Ignorable="w14 wp14">
   <w:body>
      <w:tbl>
         <w:tblPr>
            <w:tblStyle w:val="TableGrid" />
            <w:tblW w:w="9923" w:type="dxa" />
            <w:tblInd w:w="-743" w:type="dxa" />
            <w:tblBorders>
               <w:top w:val="none" w:sz="0" w:space="0" w:color="auto" />
               <w:left w:val="none" w:sz="0" w:space="0" w:color="auto" />
               <w:bottom w:val="none" w:sz="0" w:space="0" w:color="auto" />
               <w:right w:val="none" w:sz="0" w:space="0" w:color="auto" />
               <w:insideH w:val="none" w:sz="0" w:space="0" w:color="auto" />
               <w:insideV w:val="none" w:sz="0" w:space="0" w:color="auto" />
            </w:tblBorders>
            <w:tblLook w:val="04A0" w:firstRow="1" w:lastRow="0" w:firstColumn="1" w:lastColumn="0" w:noHBand="0" w:noVBand="1" />
         </w:tblPr>
         <w:tblGrid>
            <w:gridCol w:w="567" />
            <w:gridCol w:w="9356" />
         </w:tblGrid>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:trPr>
               <w:trHeight w:val="983" />
            </w:trPr>
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00A713A2" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="00997662">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="center" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r>
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['PersonalInformation']['FullName']?></w:t>
                  </w:r>
               </w:p>
               <w:p w:rsidR="00A713A2" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="00E0701D">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="center" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r>
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['PersonalInformation']['Address']?></w:t>
                  </w:r>
                  <w:r w:rsidR="00A713A2" w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t xml:space="preserve"></w:t>
                  </w:r>
               </w:p>
               <w:p w:rsidR="0072101E" w:rsidRPr="00246C9D" w:rsidRDefault="00A713A2" w:rsidP="007A2E0A">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="center" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t xml:space="preserve"><?=$resume['PersonalInformation']['PhoneNumber']?></w:t>
                  </w:r>
                  <w:r w:rsidR="007A2E0A">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t></w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00A713A2" w:rsidRPr="00246C9D" w:rsidRDefault="0072101E" w:rsidP="00FF011A">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t>EDUCATION</w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="00E0701D">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['Education']['Institute']?></w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:trPr>
               <w:trHeight w:val="397" />
            </w:trPr>
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="00E0701D">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:i />
                        <w:iCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:i />
                        <w:iCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['Education']['College']?>, <?=$resume['Education']['Year']?></w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="567" w:type="dxa" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="00FF011A">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
               </w:p>
            </w:tc>
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9356" w:type="dxa" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="004F2923">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t>Relevant Undergraduate Courses:</w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:trPr>
               <w:trHeight w:val="1123" />
            </w:trPr>
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="567" w:type="dxa" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="00FF011A">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
               </w:p>
            </w:tc>
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9356" w:type="dxa" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="004F2923">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['Education']['Courses']?></w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00A713A2" w:rsidRPr="00246C9D" w:rsidRDefault="006B2B6F" w:rsidP="00FF011A">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t>TECHNICAL SKILLS</w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="004F2923">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t>Languages:</w:t>
                  </w:r>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t xml:space="preserve"> <?=$resume['TechnicalSkills']['ProgrammingLanguages']?> </w:t>
                  </w:r>
                  <w:proofErr w:type="spellStart" />
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t></w:t>
                  </w:r>
                  <w:proofErr w:type="spellEnd" />
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t></w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="004F2923">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t xml:space="preserve">Databases: </w:t>
                  </w:r>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['TechnicalSkills']['Databases']?></w:t>
                  </w:r>
                  <w:proofErr w:type="spellStart" />
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t></w:t>
                  </w:r>
                  <w:proofErr w:type="spellEnd" />
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t></w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:trPr>
               <w:trHeight w:val="854" />
            </w:trPr>
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="004F2923">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t xml:space="preserve">Operating Systems: </w:t>
                  </w:r>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t xml:space="preserve"><?=$resume['TechnicalSkills']['OperatingSystems']?></w:t>
                  </w:r>
                  <w:proofErr w:type="spellStart" />
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t></w:t>
                  </w:r>
                  <w:proofErr w:type="spellEnd" />
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00997662" w:rsidRPr="00246C9D" w:rsidRDefault="00997662" w:rsidP="00FF011A">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t>WORKING EXPERIENCE</w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="004F2923">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['WorkingExperience'][0]['Organisation']?> – <?=$resume['WorkingExperience'][0]['From']?> to <?=$resume['WorkingExperience'][0]['To']?></w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="004F2923">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['WorkingExperience'][0]['Position']?></w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:trPr>
               <w:trHeight w:val="846" />
            </w:trPr>
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="004F2923">
                  <w:pPr>
                     <w:pStyle w:val="ListParagraph" />
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['WorkingExperience'][0]['Duties']?></w:t>
                  </w:r>
               </w:p>
            </w:tc>
            <w:bookmarkStart w:id="0" w:name="_GoBack" />
            <w:bookmarkEnd w:id="0" />
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="004F2923">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['WorkingExperience'][1]['Organisation']?> - <?=$resume['WorkingExperience'][1]['From']?> to <?=$resume['WorkingExperience'][1]['To']?></w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="004F2923">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['WorkingExperience'][1]['Position']?></w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidRDefault="00246C9D" w:rsidP="004F2923">
                  <w:pPr>
                     <w:pStyle w:val="ListParagraph" />
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t><?=$resume['WorkingExperience'][1]['Duties']?></w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
         <w:tr w:rsidR="00246C9D" w:rsidRPr="00246C9D" w:rsidTr="00E0701D">
            <w:tc>
               <w:tcPr>
                  <w:tcW w:w="9923" w:type="dxa" />
                  <w:gridSpan w:val="2" />
               </w:tcPr>
               <w:p w:rsidR="00E0701D" w:rsidRPr="00246C9D" w:rsidRDefault="00E0701D" w:rsidP="00BB055D">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:i />
                        <w:iCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
               </w:p>
               <w:p w:rsidR="00E0701D" w:rsidRPr="00246C9D" w:rsidRDefault="00E0701D" w:rsidP="00E0701D">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:i />
                        <w:iCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
               </w:p>
               <w:p w:rsidR="00BB055D" w:rsidRPr="00246C9D" w:rsidRDefault="00BB055D" w:rsidP="00E0701D">
                  <w:pPr>
                     <w:bidi w:val="0" />
                     <w:jc w:val="both" />
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:i />
                        <w:iCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00246C9D">
                     <w:rPr>
                        <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
                        <w:b />
                        <w:bCs />
                        <w:i />
                        <w:iCs />
                        <w:color w:val="000000" w:themeColor="text1" />
                        <w:sz w:val="24" />
                        <w:szCs w:val="24" />
                        <w:lang w:bidi="ar-EG" />
                     </w:rPr>
                     <w:t>All references are available on request</w:t>
                  </w:r>
               </w:p>
            </w:tc>
         </w:tr>
      </w:tbl>
      <w:p w:rsidR="001652D0" w:rsidRPr="00246C9D" w:rsidRDefault="001652D0" w:rsidP="00D407C7">
         <w:pPr>
            <w:bidi w:val="0" />
            <w:jc w:val="both" />
            <w:rPr>
               <w:rFonts w:asciiTheme="majorBidi" w:hAnsiTheme="majorBidi" w:cstheme="majorBidi" />
               <w:color w:val="000000" w:themeColor="text1" />
               <w:sz w:val="24" />
               <w:szCs w:val="24" />
               <w:lang w:bidi="ar-EG" />
            </w:rPr>
         </w:pPr>
      </w:p>
      <w:sectPr w:rsidR="001652D0" w:rsidRPr="00246C9D" w:rsidSect="00E0701D">
         <w:pgSz w:w="11906" w:h="16838" />
         <w:pgMar w:top="1276" w:right="1800" w:bottom="567" w:left="1800" w:header="708" w:footer="708" w:gutter="0" />
         <w:cols w:space="708" />
         <w:bidi />
         <w:rtlGutter />
         <w:docGrid w:linePitch="360" />
      </w:sectPr>
   </w:body>
</w:document>